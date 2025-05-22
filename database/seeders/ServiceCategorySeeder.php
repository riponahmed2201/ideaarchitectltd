<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $categories = [
            [
                'name' => 'Architectural',
                'description' => 'Exterior design, Animation, Urban Planning, Landscape Design',
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Interior',
                'description' => 'Residential interior, Office interior, Hotel & Restaurant Interior, Hospital interior, Showroom interior',
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Construction',
                'description' => 'Building construction',
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Rajuk support',
                'description' => 'Support for Rajuk approval process',
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Door & furniture',
                'description' => 'Door and Furniture related services',
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        ServiceCategory::insert($categories);
    }
}
