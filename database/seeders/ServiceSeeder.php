<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        // Fetch categories by name for FK relation
        $categories = ServiceCategory::whereIn('name', [
            'Architectural',
            'Interior',
            'Construction',
            'Rajuk support',
            'Door & furniture'
        ])->get()->keyBy('name');

        $services = [
            // Architectural services
            [
                'service_category_id' => $categories['Architectural']->id,
                'name' => 'Exterior design',
                'description' => 'Designing building exteriors',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['Architectural']->id,
                'name' => 'Animation',
                'description' => '3D architectural animations',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['Architectural']->id,
                'name' => 'Urban Planning',
                'description' => 'Planning urban spaces',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['Architectural']->id,
                'name' => 'Landscape Design',
                'description' => 'Designing outdoor landscapes',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Interior services
            [
                'service_category_id' => $categories['Interior']->id,
                'name' => 'Residential interior',
                'description' => 'Interior design for homes',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['Interior']->id,
                'name' => 'Office interior',
                'description' => 'Office space interior design',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['Interior']->id,
                'name' => 'Hotel & Restaurant Interior',
                'description' => 'Interiors for hospitality industry',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['Interior']->id,
                'name' => 'Hospital interior',
                'description' => 'Healthcare facility interior design',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['Interior']->id,
                'name' => 'Showroom interior',
                'description' => 'Design of commercial showrooms',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Construction
            [
                'service_category_id' => $categories['Construction']->id,
                'name' => 'Building construction',
                'description' => 'Construction services',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Rajuk support
            [
                'service_category_id' => $categories['Rajuk support']->id,
                'name' => 'Rajuk approval support',
                'description' => 'Assisting in Rajuk approval process',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Door & furniture
            [
                'service_category_id' => $categories['Door & furniture']->id,
                'name' => 'Door',
                'description' => 'Door manufacturing and installation',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['Door & furniture']->id,
                'name' => 'Furniture',
                'description' => 'Furniture designing and manufacturing',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Service::insert($services);
    }
}
