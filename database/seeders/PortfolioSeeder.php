<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Service;
use Database\Seeders\Concerns\SeedsImages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    use SeedsImages;

    public function run(): void
    {
        Portfolio::whereIn('slug', [
            'luxury-villa-in-gulshan',
            'corporate-office-interior',
            'residential-apartment-design',
            'restaurant-interior',
            'commercial-building-exterior',
            'mirpur-residential-complex',
            'banani-office-tower',
            'public-community-center',
        ])->delete();

        $services = Service::pluck('id', 'slug');

        if ($services->isEmpty()) {
            return;
        }

        $portfolios = [
            [
                'title' => 'Gulshan Lake View Villa',
                'slug' => 'gulshan-lake-view-villa',
                'service_slug' => 'residential-interior',
                'client_name' => 'Mr. Abdul Karim',
                'area_sft' => '4,200',
                'location' => 'Gulshan-2, Dhaka',
                'space_type' => 'residential',
                'status_type' => 'finished',
                'is_featured' => true,
                'description' => 'A 4,200 sft duplex villa featuring open-plan living, marble flooring, custom cabinetry, and a rooftop lounge with panoramic city views.',
                'image' => $this->seedImage('portfolio-gulshan-villa.jpg', $this->unsplash('photo-1600607687939-ce8a6c25118c', 1000, 750)),
                'date' => '2025-09-12',
            ],
            [
                'title' => 'Banani Corporate HQ Interior',
                'slug' => 'banani-corporate-hq-interior',
                'service_slug' => 'office-interior',
                'client_name' => 'Prime Holdings',
                'area_sft' => '6,800',
                'location' => 'Banani, Dhaka',
                'space_type' => 'office',
                'status_type' => 'finished',
                'is_featured' => true,
                'description' => 'Full-floor office fit-out with reception, executive cabins, open workstations, meeting pods, and acoustic ceiling solutions.',
                'image' => $this->seedImage('portfolio-banani-office.jpg', $this->unsplash('photo-1497366216548-37526070297c', 1000, 750)),
                'date' => '2025-06-28',
            ],
            [
                'title' => 'Dhanmondi Family Apartment',
                'slug' => 'dhanmondi-family-apartment',
                'service_slug' => 'residential-interior',
                'client_name' => 'Mrs. Nusrat Jahan',
                'area_sft' => '1,850',
                'location' => 'Dhanmondi, Dhaka',
                'space_type' => 'residential',
                'status_type' => 'finished',
                'is_featured' => true,
                'description' => 'Warm contemporary apartment interior with optimized storage, kids room planning, and a compact dining-kitchen zone.',
                'image' => $this->seedImage('portfolio-dhanmondi-apartment.jpg', $this->unsplash('photo-1600210492486-724fe5c67fb0', 1000, 750)),
                'date' => '2025-11-03',
            ],
            [
                'title' => 'Mirpur Signature Restaurant',
                'slug' => 'mirpur-signature-restaurant',
                'service_slug' => 'hotel-restaurant-interior',
                'client_name' => 'Spice Route Dining',
                'area_sft' => '2,400',
                'location' => 'Mirpur-10, Dhaka',
                'space_type' => 'commercial',
                'status_type' => 'finished',
                'description' => 'Restaurant interior with ambient lighting, booth seating, open kitchen view, and branded accent walls.',
                'image' => $this->seedImage('portfolio-mirpur-restaurant.jpg', $this->unsplash('photo-1517248135467-4c7edcad34c4', 1000, 750)),
                'date' => '2025-04-18',
            ],
            [
                'title' => 'Uttara Commercial Facade',
                'slug' => 'uttara-commercial-facade',
                'service_slug' => 'exterior-design',
                'client_name' => 'Bengal Builders Ltd',
                'area_sft' => '14,500',
                'location' => 'Uttara Sector-7, Dhaka',
                'space_type' => 'exterior',
                'status_type' => 'finished',
                'description' => 'Modern commercial building elevation with aluminium composite panel, curtain wall glazing, and integrated signage zones.',
                'image' => $this->seedImage('portfolio-uttara-facade.jpg', $this->unsplash('photo-1486406146926-c627a92ad1ab', 1000, 750)),
                'date' => '2025-02-22',
            ],
            [
                'title' => 'Bashundhara Residential Tower',
                'slug' => 'bashundhara-residential-tower',
                'service_slug' => 'building-construction',
                'client_name' => 'Sheltech Group',
                'area_sft' => '38,000',
                'location' => 'Bashundhara R/A, Dhaka',
                'space_type' => 'residential',
                'status_type' => 'running',
                'description' => 'G+7 residential tower — structural works complete, interior fit-out and common area finishing in progress.',
                'image' => $this->seedImage('portfolio-bashundhara-tower.jpg', $this->unsplash('photo-1545324418-cc1a3fa10c00', 1000, 750)),
                'date' => '2026-01-15',
            ],
            [
                'title' => 'Banani IT Park Office Fit-Out',
                'slug' => 'banani-it-park-office-fit-out',
                'service_slug' => 'office-interior',
                'client_name' => 'TechNova Solutions',
                'area_sft' => '5,200',
                'location' => 'Banani DOHS, Dhaka',
                'space_type' => 'office',
                'status_type' => 'running',
                'description' => 'Agile workspace design for a 120-person software team with collaboration zones and server room planning.',
                'image' => $this->seedImage('portfolio-banani-it-office.jpg', $this->unsplash('photo-1497215842964-222b430dc094', 1000, 750)),
                'date' => '2026-02-01',
            ],
            [
                'title' => 'Mirpur Community Center',
                'slug' => 'mirpur-community-center',
                'service_slug' => 'urban-planning',
                'client_name' => 'Dhaka North City Corporation',
                'area_sft' => '8,600',
                'location' => 'Mirpur-6, Dhaka',
                'space_type' => 'public',
                'status_type' => 'finished',
                'description' => 'Public community hall with multipurpose auditorium, prayer space, landscaped courtyard, and accessible ramps.',
                'image' => $this->seedImage('portfolio-mirpur-community.jpg', $this->unsplash('photo-1600047509358-9dc75507daeb', 1000, 750)),
                'date' => '2024-12-08',
            ],
        ];

        foreach ($portfolios as $data) {
            $serviceSlug = $data['service_slug'];
            unset($data['service_slug']);

            Portfolio::updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, [
                    'service_id' => $services[$serviceSlug] ?? $services->first(),
                    'status' => 1,
                    'is_featured' => $data['is_featured'] ?? false,
                ])
            );
        }
    }
}
