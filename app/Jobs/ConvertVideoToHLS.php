<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Process\Process;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class ConvertVideoToHLS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        protected string $localPath,
        protected string $key,
        protected int $sectionId
    ) {}

    public function handle()
    {
        Log::info('[FFMPEG] Dönüştürme başlatılıyor.', [
            'section_id' => $this->sectionId,
            'local_path' => $this->localPath
        ]);

        $outputDir = storage_path("app/hls-temp/{$this->key}");
        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        $ffmpegPath = '/opt/homebrew/bin/ffmpeg'; // senin sistem yoluna göre ayarla
        $ffmpegPath = '/usr/bin/ffmpeg'; // senin sistem yoluna göre ayarla
        $outputFile = "$outputDir/output.m3u8";

        $command = [
            $ffmpegPath,
            '-i', $this->localPath,
            '-profile:v', 'baseline',
            '-level', '3.0',
            '-start_number', '0',
            '-hls_time', '10',
            '-hls_list_size', '0',
            '-f', 'hls',
            $outputFile
        ];

        $process = new Process($command);
        $process->setTimeout(300);
        $process->run();

        if (!$process->isSuccessful()) {
            Log::error('[FFMPEG ERROR] Dönüştürme başarısız.', [
                'error' => $process->getErrorOutput()
            ]);
            return;
        }

        Log::info('[FFMPEG] Başarılı. Upload job kuyruğa atılıyor.', [
            'key' => $this->key
        ]);

        // S3’e yükleyecek ikinci job’ı sıraya al
        UploadHlsToS3::dispatch($this->key, $this->sectionId, $this->localPath);
    }
}

