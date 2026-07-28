<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $categories = [
            [
                'name' => 'Architectural',
                'slug' => 'architectural',
                'description' => 'Exterior design, 3D visualization, urban planning & landscape architecture',
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Interior',
                'slug' => 'interior',
                'description' => 'Residential, office, hotel, hospital & showroom interior design',
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Construction',
                'slug' => 'construction',
                'description' => 'Turnkey building construction with site supervision & quality control',
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'RAJUK Support',
                'slug' => 'rajuk-support',
                'description' => 'Drawing preparation, documentation & approval follow-up for Dhaka projects',
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Door & Furniture',
                'slug' => 'door-furniture',
                'description' => 'Custom doors, wardrobes, kitchen cabinets & bespoke furniture',
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($categories as $category) {
            ServiceCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
