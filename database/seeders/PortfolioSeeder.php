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
        $placeholder = 'seed/placeholder.jpg';
        $services = Service::pluck('id');

        if ($services->isEmpty()) {
            return;
        }

        $portfolios = [
            ['title' => 'Luxury Villa in Gulshan', 'client_name' => 'Mr. Rahman', 'area_sft' => '3500', 'location' => 'Gulshan, Dhaka', 'space_type' => 'residential', 'status_type' => 'finished', 'is_featured' => true, 'description' => 'A modern luxury villa with contemporary design elements.'],
            ['title' => 'Corporate Office Interior', 'client_name' => 'Tech Solutions Ltd', 'area_sft' => '5000', 'location' => 'Banani, Dhaka', 'space_type' => 'office', 'status_type' => 'finished', 'is_featured' => true, 'description' => 'Complete office interior design and execution.'],
            ['title' => 'Residential Apartment Design', 'client_name' => 'Mrs. Khan', 'area_sft' => '1800', 'location' => 'Dhanmondi, Dhaka', 'space_type' => 'residential', 'status_type' => 'finished', 'is_featured' => true, 'description' => 'Elegant apartment interior with space optimization.'],
            ['title' => 'Restaurant Interior', 'client_name' => 'Food Hub', 'area_sft' => '2200', 'location' => 'Mirpur, Dhaka', 'space_type' => 'commercial', 'status_type' => 'finished', 'description' => 'Warm and inviting restaurant interior design.'],
            ['title' => 'Commercial Building Exterior', 'client_name' => 'BuildCorp', 'area_sft' => '12000', 'location' => 'Uttara, Dhaka', 'space_type' => 'exterior', 'status_type' => 'finished', 'description' => 'Striking commercial building facade design.'],
            ['title' => 'Mirpur Residential Complex', 'client_name' => 'Urban Living Co', 'area_sft' => '3500', 'location' => 'Mirpur, Dhaka', 'space_type' => 'residential', 'status_type' => 'running', 'description' => 'Ongoing residential complex project.'],
            ['title' => 'Banani Office Tower', 'client_name' => 'PDS Limited', 'area_sft' => '8000', 'location' => 'Banani, Dhaka', 'space_type' => 'office', 'status_type' => 'running', 'description' => 'Commercial office tower under construction.'],
            ['title' => 'Public Community Center', 'client_name' => 'City Corporation', 'area_sft' => '6000', 'location' => 'Dhaka', 'space_type' => 'public', 'status_type' => 'finished', 'description' => 'Public space design and execution.'],
        ];

        foreach ($portfolios as $data) {
            Portfolio::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                array_merge($data, [
                    'service_id' => $services->random(),
                    'image' => $placeholder,
                    'date' => now()->subMonths(rand(1, 12))->format('Y-m-d'),
                    'status' => 1,
                    'is_featured' => $data['is_featured'] ?? false,
                ])
            );
        }
    }
}
