<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $placeholder = 'seed/placeholder.jpg';

        foreach ([
            [
                'title' => 'Building Your Dream Home',
                'short_description' => 'Expert architectural design and construction services in Dhaka.',
                'image' => $placeholder,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Interior Design Excellence',
                'short_description' => 'Transform your space with our professional interior design team.',
                'image' => $placeholder,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'RAJUK Approval Support',
                'short_description' => 'Hassle-free RAJUK approval process for your building projects.',
                'image' => $placeholder,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ] as $slider) {
            Slider::updateOrCreate(
                ['title' => $slider['title']],
                $slider
            );
        }
    }
}
