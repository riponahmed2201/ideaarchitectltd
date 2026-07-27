<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $placeholder = 'seed/placeholder.jpg';

        $projects = [
            ['title' => 'Mirpur Residential Complex', 'type' => 'running', 'area_sft' => '3500', 'location' => 'Mirpur, Dhaka', 'description' => 'Ongoing residential complex project.', 'date' => '2025-06-01'],
            ['title' => 'Banani Office Tower', 'type' => 'running', 'area_sft' => '8000', 'location' => 'Banani, Dhaka', 'description' => 'Commercial office tower under construction.', 'date' => '2025-03-15'],
            ['title' => 'Dhanmondi Family Home', 'type' => 'finished', 'area_sft' => '2800', 'location' => 'Dhanmondi, Dhaka', 'description' => 'Completed family home with modern design.', 'date' => '2024-12-01'],
            ['title' => 'Uttara Shopping Complex', 'type' => 'finished', 'area_sft' => '12000', 'location' => 'Uttara, Dhaka', 'description' => 'Completed commercial shopping complex.', 'date' => '2024-08-20'],
            ['title' => 'Gulshan Apartment Renovation', 'type' => 'finished', 'area_sft' => '1800', 'location' => 'Gulshan, Dhaka', 'description' => 'Full apartment renovation project.', 'date' => '2024-05-10'],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                array_merge($project, [
                    'image' => $placeholder,
                    'url' => null,
                    'status' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ])
            );
        }
    }
}
