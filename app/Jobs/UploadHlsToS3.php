<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\SerieSection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadHlsToS3 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        protected string $key,
        protected int $sectionId,
        protected string $localPath
    ) {}

    public function handle()
    {
        Log::info('[UPLOAD] Başladı.', ['key' => $this->key]);

        $disk = Storage::disk('s3');
        $outputDir = storage_path("app/hls-temp/{$this->key}");
        $remoteFolder = "videos/{$this->key}";

        $files = glob("$outputDir/*");
        $current = 1;
        $total = count($files);

        foreach ($files as $file) {
            $filename = basename($file);

            $disk->putFileAs($remoteFolder, new \Illuminate\Http\File($file), $filename, 'public');

            Log::info('[UPLOAD] Dosya yüklendi.', [
                'filename' => $filename,
                'progress' => "{$current}/{$total}"
            ]);

            usleep(250000); // 0.25 saniye dinlen
            $current++;
        }

        $url = $disk->url("$remoteFolder/output.m3u8");

        $section = SerieSection::find($this->sectionId);
        if ($section) {
            $section->update(['video_path' => $url]);
            Log::info('[DB] Güncellendi.', ['section_id' => $this->sectionId]);
        }

        // Temizlik
        unlink($this->localPath);
        foreach ($files as $f) {
            unlink($f);
        }
        rmdir($outputDir);

        Log::info('[UPLOAD JOB END] Tüm işlemler tamamlandı.', ['section_id' => $this->sectionId]);
    }
}
