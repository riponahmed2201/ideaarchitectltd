<?php

namespace Database\Seeders\Concerns;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

trait SeedsImages
{
    protected function seedImage(string $filename, string $url): string
    {
        $path = 'seed/'.$filename;

        if (Storage::disk('public')->exists($path)) {
            return $path;
        }

        try {
            $response = Http::timeout(90)
                ->withHeaders(['User-Agent' => 'IdeaArchitectSeeder/1.0'])
                ->get($url);

            if ($response->successful() && strlen($response->body()) > 1500) {
                Storage::disk('public')->put($path, $response->body());

                return $path;
            }
        } catch (\Throwable) {
            // Fall back to placeholder below.
        }

        return $this->fallbackImage();
    }

    protected function seedAvatar(string $filename, string $name, string $background = '3e4095', string $color = 'ffffff'): string
    {
        $query = http_build_query([
            'name' => $name,
            'background' => $background,
            'color' => $color,
            'size' => 256,
            'format' => 'png',
            'bold' => 'true',
        ]);

        return $this->seedImage($filename, 'https://ui-avatars.com/api/?'.$query);
    }

    protected function fallbackImage(): string
    {
        $path = 'seed/placeholder.jpg';
        $source = public_path('assets/logo/logo.png');

        if (! Storage::disk('public')->exists($path) && file_exists($source)) {
            Storage::disk('public')->put($path, file_get_contents($source));
        }

        return $path;
    }

    protected function unsplash(string $photoId, int $width = 1200, ?int $height = null): string
    {
        $params = [
            'w' => $width,
            'q' => 82,
            'auto' => 'format',
            'fit' => 'crop',
        ];

        if ($height !== null) {
            $params['h'] = $height;
        }

        return 'https://images.unsplash.com/'.$photoId.'?'.http_build_query($params);
    }
}
