<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class ConvertMp4ToHls extends Command
{
    protected $signature = 'video:convert-to-hls {path} {--key=}';

    protected $description = 'MP4 dosyasını HLS formatına çevirir ve S3\'e yükler';

    public function handle()
    {
        $path = $this->argument('path'); // /full/path/to/input.mp4
        $key = $this->option('key') ?? Str::random(8); // klasör ismi

        if (!file_exists($path)) {
            $this->error("Dosya bulunamadı: $path");
            return;
        }

        $outputDir = storage_path("app/hls-temp/$key");
        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        $this->info("Dönüştürme başlıyor...");

        $command = [
            'ffmpeg',
            '-i', $path,
            '-profile:v', 'baseline',
            '-level', '3.0',
            '-start_number', '0',
            '-hls_time', '10',
            '-hls_list_size', '0',
            '-f', 'hls',
            "$outputDir/output.m3u8"
        ];

        $process = new Process($command);
        $process->run();

        if (!$process->isSuccessful()) {
            $this->error("FFmpeg hatası:\n" . $process->getErrorOutput());
            return;
        }

        $this->info("Yükleme başlıyor...");

        $disk = Storage::disk('s3');
        $remoteFolder = "videos/$key";

        foreach (glob("$outputDir/*") as $file) {
            $filename = basename($file);
            $disk->put("$remoteFolder/$filename", fopen($file, 'r+'));
        }

        $url = $disk->url("$remoteFolder/output.m3u8");

        $this->info("✅ Tamamlandı!");
        $this->info("Playlist URL: $url");

        return Command::SUCCESS;
    }
}
