<?php

namespace Database\Seeders;

use App\Models\Slider;
use Database\Seeders\Concerns\SeedsImages;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    use SeedsImages;

    public function run(): void
    {
        Slider::whereIn('title', [
            'Building Your Dream Home',
            'Interior Design Excellence',
            'RAJUK Approval Support',
        ])->delete();

        $now = now();

        $sliders = [
            [
                'title' => 'Designing Spaces That Inspire',
                'short_description' => 'From concept to handover — architecture, interior, and construction under one roof in Dhaka.',
                'image' => $this->seedImage('slider-hero-home.jpg', $this->unsplash('photo-1600585154340-be6161a56a0c', 1920, 1080)),
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Premium Interior for Modern Living',
                'short_description' => 'Tailored apartment and villa interiors with smart layouts, natural light, and refined finishes.',
                'image' => $this->seedImage('slider-hero-interior.jpg', $this->unsplash('photo-1600566753190-17f0baa2a6c3', 1920, 1080)),
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'RAJUK Approval Made Simple',
                'short_description' => 'Complete drawing preparation, documentation, and follow-up support for hassle-free approvals.',
                'image' => $this->seedImage('slider-hero-rajuk.jpg', $this->unsplash('photo-1503387762-592deb58ef4e', 1920, 1080)),
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::updateOrCreate(
                ['title' => $slider['title']],
                $slider
            );
        }
    }
}
