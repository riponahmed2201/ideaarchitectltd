<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $placeholder = 'seed/placeholder.jpg';
        $services = Service::pluck('id');

        if ($services->isEmpty()) {
            return;
        }

        $portfolios = [
            ['title' => 'Luxury Villa in Gulshan', 'client_name' => 'Mr. Rahman', 'description' => 'A modern luxury villa with contemporary design elements.'],
            ['title' => 'Corporate Office Interior', 'client_name' => 'Tech Solutions Ltd', 'description' => 'Complete office interior design and execution.'],
            ['title' => 'Residential Apartment Design', 'client_name' => 'Mrs. Khan', 'description' => 'Elegant apartment interior with space optimization.'],
            ['title' => 'Restaurant Interior', 'client_name' => 'Food Hub', 'description' => 'Warm and inviting restaurant interior design.'],
            ['title' => 'Commercial Building Exterior', 'client_name' => 'BuildCorp', 'description' => 'Striking commercial building facade design.'],
        ];

        foreach ($portfolios as $index => $data) {
            Portfolio::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'service_id' => $services->random(),
                    'title' => $data['title'],
                    'client_name' => $data['client_name'],
                    'image' => $placeholder,
                    'date' => now()->subMonths($index + 1)->format('Y-m-d'),
                    'description' => $data['description'],
                    'status' => 1,
                ]
            );
        }
    }
}
