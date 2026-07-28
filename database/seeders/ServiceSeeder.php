<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use Database\Seeders\Concerns\SeedsImages;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    use SeedsImages;

    public function run(): void
    {
        $now = now();

        $categories = ServiceCategory::whereIn('slug', [
            'architectural',
            'interior',
            'construction',
            'rajuk-support',
            'door-furniture',
        ])->get()->keyBy('slug');

        $services = [
            [
                'service_category_id' => $categories['architectural']->id,
                'name' => 'Exterior Design',
                'slug' => 'exterior-design',
                'short_description' => 'Striking building facades that balance aesthetics, climate, and local regulations.',
                'description' => 'We design modern and classical building exteriors for residential towers, commercial plots, and mixed-use developments — including material selection, 3D renders, and working drawings for construction.',
                'image' => $this->seedImage('service-exterior-design.jpg', $this->unsplash('photo-1600585152915-d208bec867a1', 800, 560)),
            ],
            [
                'service_category_id' => $categories['architectural']->id,
                'name' => '3D Animation & Visualization',
                'slug' => 'animation',
                'short_description' => 'Photorealistic 3D renders and walkthrough animations for client presentations.',
                'description' => 'High-quality exterior and interior visualizations help clients approve designs confidently before construction begins. Ideal for marketing, investor decks, and RAJUK submissions.',
                'image' => $this->seedImage('service-animation.jpg', $this->unsplash('photo-1616486338812-3dadae4b4ace', 800, 560)),
            ],
            [
                'service_category_id' => $categories['architectural']->id,
                'name' => 'Urban Planning',
                'slug' => 'urban-planning',
                'short_description' => 'Master planning for housing schemes, commercial zones, and mixed developments.',
                'description' => 'Site analysis, circulation planning, parking layout, green space allocation, and phased development strategies aligned with local authority guidelines.',
                'image' => $this->seedImage('service-urban-planning.jpg', $this->unsplash('photo-1449824913935-59a10b8d2000', 800, 560)),
            ],
            [
                'service_category_id' => $categories['architectural']->id,
                'name' => 'Landscape Design',
                'slug' => 'landscape-design',
                'short_description' => 'Rooftop gardens, courtyards, and outdoor living spaces for Dhaka homes.',
                'description' => 'Softscape and hardscape design including planters, pergolas, water features, pathway lighting, and low-maintenance planting suited to Bangladesh climate.',
                'image' => $this->seedImage('service-landscape.jpg', $this->unsplash('photo-1558618666-fcd25c85cd64', 800, 560)),
            ],
            [
                'service_category_id' => $categories['interior']->id,
                'name' => 'Residential Interior',
                'slug' => 'residential-interior',
                'short_description' => 'Elegant apartment and villa interiors tailored to your lifestyle.',
                'description' => 'Complete interior solutions — space planning, false ceiling, flooring, kitchen & wardrobe design, lighting, and furniture coordination with detailed BOQ and site supervision.',
                'image' => $this->seedImage('service-residential-interior.jpg', $this->unsplash('photo-1600210492486-724fe5c67fb0', 800, 560)),
            ],
            [
                'service_category_id' => $categories['interior']->id,
                'name' => 'Office Interior',
                'slug' => 'office-interior',
                'short_description' => 'Productive, brand-aligned workspaces for teams of every size.',
                'description' => 'Reception, open office, meeting rooms, executive cabins, pantry, and server room planning with acoustic, ergonomic, and IT infrastructure considerations.',
                'image' => $this->seedImage('service-office-interior.jpg', $this->unsplash('photo-1497366216548-37526070297c', 800, 560)),
            ],
            [
                'service_category_id' => $categories['interior']->id,
                'name' => 'Hotel & Restaurant Interior',
                'slug' => 'hotel-restaurant-interior',
                'short_description' => 'Memorable hospitality spaces that elevate guest experience.',
                'description' => 'Lobby, dining, banquet, and guest room interiors with ambience lighting, durable finishes, and operational layouts for F&B efficiency.',
                'image' => $this->seedImage('service-restaurant-interior.jpg', $this->unsplash('photo-1517248135467-4c7edcad34c4', 800, 560)),
            ],
            [
                'service_category_id' => $categories['interior']->id,
                'name' => 'Hospital Interior',
                'slug' => 'hospital-interior',
                'short_description' => 'Clean, compliant healthcare interiors for clinics and diagnostic centres.',
                'description' => 'Patient-friendly waiting areas, consultation rooms, OT prep zones, and circulation planning meeting hygiene and accessibility standards.',
                'image' => $this->seedImage('service-hospital-interior.jpg', $this->unsplash('photo-1519494026892-80bbd2d6fd0d', 800, 560)),
            ],
            [
                'service_category_id' => $categories['interior']->id,
                'name' => 'Showroom Interior',
                'slug' => 'showroom-interior',
                'short_description' => 'Retail and product display spaces designed to drive footfall.',
                'description' => 'Showroom zoning, display lighting, brand wall treatments, and customer flow planning for automobile, furniture, and electronics retailers.',
                'image' => $this->seedImage('service-showroom-interior.jpg', $this->unsplash('photo-1441986300917-64674bd600d8', 800, 560)),
            ],
            [
                'service_category_id' => $categories['construction']->id,
                'name' => 'Building Construction',
                'slug' => 'building-construction',
                'short_description' => 'Reliable turnkey construction with transparent milestones.',
                'description' => 'RCC structure, masonry, MEP coordination, finishing works, and handover documentation — managed by experienced site engineers with weekly progress reporting.',
                'image' => $this->seedImage('service-construction.jpg', $this->unsplash('photo-1541888946425-d81bb19240f5', 800, 560)),
            ],
            [
                'service_category_id' => $categories['rajuk-support']->id,
                'name' => 'RAJUK Approval Support',
                'slug' => 'rajuk-approval-support',
                'short_description' => 'Hassle-free submission, tracking, and approval for Dhaka projects.',
                'description' => 'Drawing preparation, document compilation, file submission, and liaison with RAJUK / DNCC reviewers until approval letter is issued.',
                'image' => $this->seedImage('service-rajuk.jpg', $this->unsplash('photo-1503387762-592deb58ef4e', 800, 560)),
            ],
            [
                'service_category_id' => $categories['door-furniture']->id,
                'name' => 'Custom Doors',
                'slug' => 'door',
                'short_description' => 'Engineered doors for main entrance, bedroom, and kitchen.',
                'description' => 'Solid core, flush, and panel doors with premium veneers, hardware, and factory finishing — measured, manufactured, and installed on site.',
                'image' => $this->seedImage('service-door.jpg', $this->unsplash('photo-1502672260266-1c1ef2d93688', 800, 560)),
            ],
            [
                'service_category_id' => $categories['door-furniture']->id,
                'name' => 'Custom Furniture',
                'slug' => 'furniture',
                'short_description' => 'Bespoke wardrobes, TV units, beds, and dining sets.',
                'description' => 'Made-to-measure furniture designed to match your interior theme — using quality board, hardware, and factory-applied finishes for durability.',
                'image' => $this->seedImage('service-furniture.jpg', $this->unsplash('photo-1555041469-a586c61ea9bc', 800, 560)),
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                array_merge($service, [
                    'status' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ])
            );
        }
    }
}
