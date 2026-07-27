<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadService
{
    public function store(UploadedFile $file, string $directory, int $maxWidth = 1920, int $quality = 85): string
    {
        $filename = md5(Str::random(10) . time()) . '.' . $file->getClientOriginalExtension();
        $path = $directory . '/' . $filename;
        $fullPath = Storage::disk('public')->path($path);

        Storage::disk('public')->makeDirectory($directory);

        if ($this->canOptimize($file)) {
            $this->optimizeToPath($file, $fullPath, $maxWidth, $quality);
        } else {
            Storage::disk('public')->putFileAs($directory, $file, $filename);
        }

        return $path;
    }

    public function delete(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    private function canOptimize(UploadedFile $file): bool
    {
        return in_array(strtolower($file->getClientOriginalExtension()), ['jpg', 'jpeg', 'png', 'webp'], true)
            && function_exists('imagecreatefromjpeg');
    }

    private function optimizeToPath(UploadedFile $file, string $destination, int $maxWidth, int $quality): void
    {
        $extension = strtolower($file->getClientOriginalExtension());
        $source = match ($extension) {
            'png' => imagecreatefrompng($file->getRealPath()),
            'webp' => function_exists('imagecreatefromwebp') ? imagecreatefromwebp($file->getRealPath()) : null,
            default => imagecreatefromjpeg($file->getRealPath()),
        };

        if (! $source) {
            copy($file->getRealPath(), $destination);

            return;
        }

        $width = imagesx($source);
        $height = imagesy($source);

        if ($width > $maxWidth) {
            $newWidth = $maxWidth;
            $newHeight = (int) round($height * ($maxWidth / $width));
            $resized = imagecreatetruecolor($newWidth, $newHeight);

            if ($extension === 'png') {
                imagealphablending($resized, false);
                imagesavealpha($resized, true);
            }

            imagecopyresampled($resized, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagedestroy($source);
            $source = $resized;
        }

        match ($extension) {
            'png' => imagepng($source, $destination, 8),
            'webp' => function_exists('imagewebp') ? imagewebp($source, $destination, $quality) : imagejpeg($source, $destination, $quality),
            default => imagejpeg($source, $destination, $quality),
        };

        imagedestroy($source);
    }
}
