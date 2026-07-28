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
            [
                'title' => 'Gulshan Luxury Apartment — Interior Walkthrough',
                'url' => 'f5on6s1dg-U',
                'area_sft' => '3,200',
                'description' => 'Completed residential interior in Gulshan featuring open living, designer kitchen, and master suite with walk-in wardrobe.',
                'status' => 1,
            ],
            [
                'title' => '8-Storied Residential Tower — Bashundhara R/A',
                'url' => 'nfSrtxpRWpU',
                'area_sft' => '38,000',
                'description' => 'Architectural design showcase for a G+7 apartment building with modern facade and optimised unit layouts.',
                'status' => 1,
            ],
            [
                'title' => 'Modern Living at Jolshiri Abashon, Dhaka',
                'url' => 'HX8QyS3EzM4',
                'area_sft' => '2,100',
                'description' => 'Contemporary apartment interior tour highlighting space planning, lighting, and material palette for urban families.',
                'status' => 1,
            ],
        ];

        foreach ($videos as $video) {
            Video::updateOrCreate(
                ['title' => $video['title']],
                array_merge($video, ['created_at' => $now, 'updated_at' => $now])
            );
        }
    }
}
