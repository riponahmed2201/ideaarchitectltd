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
        $categories = ServiceCategory::whereIn('slug', [
            'architectural',
            'interior',
            'construction',
            'rajuk-support',
            'door-furniture'
        ])->get()->keyBy('slug');

        $services = [
            // Architectural services
            [
                'service_category_id' => $categories['architectural']->id,
                'name' => 'Exterior design',
                'slug' => 'exterior-design',
                'short_description' => 'Designing building exteriors',
                'description' => 'Designing building exteriors',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['architectural']->id,
                'name' => 'Animation',
                'slug' => 'animation',
                'short_description' => '3D architectural animations',
                'description' => '3D architectural animations',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['architectural']->id,
                'name' => 'Urban Planning',
                'slug' => 'urban-planning',
                'short_description' => 'Planning urban spaces',
                'description' => 'Planning urban spaces',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['architectural']->id,
                'name' => 'Landscape Design',
                'slug' => 'landscape-design',
                'short_description' => 'Designing outdoor landscapes',
                'description' => 'Designing outdoor landscapes',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Interior services
            [
                'service_category_id' => $categories['interior']->id,
                'name' => 'Residential interior',
                'slug' => 'residential-interior',
                'short_description' => 'Interior design for homes',
                'description' => 'Interior design for homes',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['interior']->id,
                'name' => 'Office interior',
                'slug' => 'office-interior',
                'short_description' => 'Office space interior design',
                'description' => 'Office space interior design',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['interior']->id,
                'name' => 'Hotel & Restaurant Interior',
                'slug' => 'hotel-restaurant-interior',
                'short_description' => 'Interiors for hospitality industry',
                'description' => 'Interiors for hospitality industry',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['interior']->id,
                'name' => 'Hospital interior',
                'slug' => 'hospital-interior',
                'short_description' => 'Healthcare facility interior design',
                'description' => 'Healthcare facility interior design',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['interior']->id,
                'name' => 'Showroom interior',
                'slug' => 'showroom-interior',
                'short_description' => 'Design of commercial showrooms',
                'description' => 'Design of commercial showrooms',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Construction
            [
                'service_category_id' => $categories['construction']->id,
                'name' => 'Building construction',
                'slug' => 'building-construction',
                'short_description' => 'Construction services',
                'description' => 'Construction services',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Rajuk support
            [
                'service_category_id' => $categories['rajuk-support']->id,
                'name' => 'Rajuk approval support',
                'slug' => 'rajuk-approval-support',
                'short_description' => 'Assisting in Rajuk approval process',
                'description' => 'Assisting in Rajuk approval process',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Door & furniture
            [
                'service_category_id' => $categories['door-furniture']->id,
                'name' => 'Door',
                'slug' => 'door',
                'short_description' => 'Door manufacturing and installation',
                'description' => 'Door manufacturing and installation',
                'image' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'service_category_id' => $categories['door-furniture']->id,
                'name' => 'Furniture',
                'slug' => 'furniture',
                'short_description' => 'Furniture designing and manufacturing',
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
