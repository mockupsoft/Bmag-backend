<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait Uploadable
{
    public function uploadToS3(UploadedFile $file, string $path = ''): string
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $fullPath = rtrim($path, '/') . '/' . $fileName;

        Storage::disk('s3')->put($fullPath, file_get_contents($file), 'public');

        return Storage::disk('s3')->url($fullPath);
    }
}
