<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['client_name' => 'Mr. Rahman', 'designation' => 'Gulshan Villa Owner', 'quote' => 'Idea Architect transformed our home beyond expectations. Their attention to detail and timely delivery was outstanding.', 'rating' => 5],
            ['client_name' => 'Tech Solutions Ltd', 'designation' => 'Commercial Client', 'quote' => 'Our office interior was completed on time with excellent quality. The team understood our brand vision perfectly.', 'rating' => 5],
            ['client_name' => 'Mrs. Khan', 'designation' => 'Residential Client', 'quote' => 'Professional team, beautiful design, and great communication throughout the project. Highly recommended!', 'rating' => 5],
        ];

        foreach ($items as $item) {
            Testimonial::updateOrCreate(
                ['client_name' => $item['client_name']],
                array_merge($item, ['status' => 1])
            );
        }
    }
}
