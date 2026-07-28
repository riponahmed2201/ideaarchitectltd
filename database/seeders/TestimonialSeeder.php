<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use App\Models\Portfolio;
use Database\Seeders\Concerns\SeedsImages;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    use SeedsImages;

    public function run(): void
    {
        Testimonial::whereIn('client_name', [
            'Mr. Rahman',
            'Tech Solutions Ltd',
            'Mrs. Khan',
        ])->delete();

        $portfolios = Portfolio::pluck('id', 'slug');

        $items = [
            [
                'client_name' => 'Mr. Abdul Karim',
                'designation' => 'Homeowner, Gulshan Lake View Villa',
                'quote' => 'Idea Architect handled everything from 3D design to final handover. The villa turned out exactly like the renders — our family is thrilled with the quality and finishing.',
                'rating' => 5,
                'portfolio_slug' => 'gulshan-lake-view-villa',
                'image' => $this->seedImage('testimonial-karim.jpg', $this->unsplash('photo-1507003211169-0a1dd7228f2d', 400, 400)),
            ],
            [
                'client_name' => 'Ms. Tasnim Ahmed',
                'designation' => 'Director, Prime Holdings',
                'quote' => 'Our Banani office was delivered within the agreed timeline. The team understood our brand colours, meeting room needs, and acoustic requirements from day one.',
                'rating' => 5,
                'portfolio_slug' => 'banani-corporate-hq-interior',
                'image' => $this->seedImage('testimonial-tasnim.jpg', $this->unsplash('photo-1580489944761-15a19d654956', 400, 400)),
            ],
            [
                'client_name' => 'Mrs. Nusrat Jahan',
                'designation' => 'Apartment Owner, Dhanmondi',
                'quote' => 'They transformed our 1,850 sft flat into a spacious, elegant home. Storage planning and lighting design made a huge difference. Highly professional team.',
                'rating' => 5,
                'portfolio_slug' => 'dhanmondi-family-apartment',
                'image' => $this->seedImage('testimonial-nusrat.jpg', $this->unsplash('photo-1438761681033-6461ffad8d80', 400, 400)),
            ],
            [
                'client_name' => 'Engr. Shahidul Haque',
                'designation' => 'Project Director, Sheltech Group',
                'quote' => 'Reliable coordination on our Bashundhara tower — clear drawings, responsive site visits, and practical solutions when challenges came up during construction.',
                'rating' => 5,
                'portfolio_slug' => 'bashundhara-residential-tower',
                'image' => $this->seedImage('testimonial-shahidul.jpg', $this->unsplash('photo-1519085360753-af0119f7cbe7', 400, 400)),
            ],
        ];

        foreach ($items as $item) {
            $portfolioSlug = $item['portfolio_slug'];
            unset($item['portfolio_slug']);

            Testimonial::updateOrCreate(
                ['client_name' => $item['client_name']],
                array_merge($item, [
                    'portfolio_id' => $portfolios[$portfolioSlug] ?? null,
                    'status' => 1,
                ])
            );
        }
    }
}
