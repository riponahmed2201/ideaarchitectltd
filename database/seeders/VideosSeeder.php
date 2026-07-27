<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideosSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $videos = [
            ['title' => 'Residential Project Walkthrough', 'url' => 'dQw4w9WgXcQ', 'area_sft' => '2500', 'description' => 'Virtual tour of a completed residential project.', 'status' => 1],
            ['title' => 'Office Interior Showcase', 'url' => 'dQw4w9WgXcQ', 'area_sft' => '5000', 'description' => 'Showcase of our latest office interior project.', 'status' => 1],
            ['title' => 'Construction Progress Update', 'url' => 'dQw4w9WgXcQ', 'area_sft' => '8000', 'description' => 'Monthly construction progress update.', 'status' => 1],
        ];

        foreach ($videos as $video) {
            Video::updateOrCreate(
                ['title' => $video['title']],
                array_merge($video, ['created_at' => $now, 'updated_at' => $now])
            );
        }
    }
}
