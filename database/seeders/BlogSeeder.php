<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Tag;
use Database\Seeders\Concerns\SeedsImages;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    use SeedsImages;

    public function run(): void
    {
        Blog::whereIn('slug', [
            'modern-residential-design-trends-dhaka',
            'rajuk-approval-process-guide',
            'interior-design-tips-small-apartments',
        ])->delete();

        $now = now();

        $blogs = [
            [
                'title' => '7 Residential Design Trends Shaping Dhaka Homes in 2026',
                'slug' => 'residential-design-trends-dhaka-2026',
                'short_description' => 'Open layouts, natural ventilation, and locally sourced materials are redefining how families live in Dhaka apartments and villas.',
                'content' => '<p>Dhaka homeowners are prioritising comfort, daylight, and low-maintenance finishes more than ever. Neutral palettes with warm wood accents remain popular, while feature walls in terracotta or deep navy add character without overwhelming smaller rooms.</p><p>Smart storage — built-in wardrobes, concealed utility zones, and multi-purpose furniture — helps families make the most of 1,200–2,000 sft apartments. Cross-ventilation and balcony extensions are also common requests in our recent Gulshan and Dhanmondi projects.</p><p>At Idea Architect Limited, we combine these trends with practical construction knowledge so designs look premium and build smoothly on site.</p>',
                'featured_image' => $this->seedImage('blog-residential-trends.jpg', $this->unsplash('photo-1600607687920-4e2a09cf159d', 1000, 650)),
                'tags' => ['architecture', 'interior-design', 'tips'],
                'status' => 1,
                'created_at' => $now->copy()->subDays(12),
                'updated_at' => $now->copy()->subDays(12),
            ],
            [
                'title' => 'RAJUK Building Approval: Documents, Timeline & Common Mistakes',
                'slug' => 'rajuk-building-approval-guide-dhaka',
                'short_description' => 'A practical checklist for homeowners and developers preparing RAJUK submission in Dhaka metropolitan area.',
                'content' => '<p>RAJUK approval is mandatory before starting most new construction or major renovation work in Dhaka. Typical submissions include land ownership documents, survey maps, architectural drawings (floor plans, elevations, sections), structural drawings, and a completed application form.</p><p>Timelines vary from 4–12 weeks depending on plot classification, road width, and completeness of drawings. Incomplete soil test reports or mismatched FAR calculations are among the most frequent causes of rejection.</p><p>Our RAJUK support team prepares coordinated architectural and structural packages, tracks file movement, and responds to reviewer queries — saving clients weeks of back-and-forth.</p>',
                'featured_image' => $this->seedImage('blog-rajuk-guide.jpg', $this->unsplash('photo-1503387762-592deb58ef4e', 1000, 650)),
                'tags' => ['rajuk', 'construction', 'tips'],
                'status' => 1,
                'created_at' => $now->copy()->subDays(28),
                'updated_at' => $now->copy()->subDays(28),
            ],
            [
                'title' => 'How to Maximize Space in a 1,200 sft Dhaka Apartment',
                'slug' => 'maximize-space-small-dhaka-apartment',
                'short_description' => 'Expert interior tips for compact flats — from kitchen planning to bedroom storage without clutter.',
                'content' => '<p>Most Dhaka apartments between 1,000–1,400 sft share similar challenges: limited dining space, one common bathroom, and bedrooms that must double as study areas. The key is zoning — clearly separating circulation, storage, and living areas.</p><p>Light colours on walls and ceilings visually expand rooms. Sliding doors, wall-mounted TV units, and floor-to-ceiling wardrobes free up floor area. In kitchens, L-shaped layouts with tall cabinets use corner space efficiently.</p><p>We recommend a 3D layout review before finalising BOQ so every square foot earns its keep. Book a free consultation at our Mirpur studio to discuss your floor plan.</p>',
                'featured_image' => $this->seedImage('blog-small-apartment.jpg', $this->unsplash('photo-1522708323590-d24dbb6b0267', 1000, 650)),
                'tags' => ['interior-design', 'tips'],
                'status' => 1,
                'created_at' => $now->copy()->subDays(45),
                'updated_at' => $now->copy()->subDays(45),
            ],
            [
                'title' => 'Choosing the Right Construction Team for Your Dream Home',
                'slug' => 'choosing-construction-team-dhaka',
                'short_description' => 'What to look for in a contractor — site supervision, material quality, payment milestones, and warranty terms.',
                'content' => '<p>Design and construction should work as one process. When architect and contractor are misaligned, clients often face rework, delays, and budget overruns. Look for teams that provide itemised BOQ, weekly progress reports, and named site supervisors.</p><p>Visit at least two completed projects before signing. Check tile alignment, paint finish, electrical panel labelling, and waterproofing details in bathrooms — these reveal true workmanship.</p><p>Idea Architect Limited offers design-build packages so drawings, approvals, and execution stay under a single accountable team.</p>',
                'featured_image' => $this->seedImage('blog-construction-team.jpg', $this->unsplash('photo-1541888946425-d81bb19240f5', 1000, 650)),
                'tags' => ['construction', 'architecture'],
                'status' => 1,
                'created_at' => $now->copy()->subDays(60),
                'updated_at' => $now->copy()->subDays(60),
            ],
        ];

        foreach ($blogs as $blogData) {
            $tagSlugs = $blogData['tags'];
            unset($blogData['tags']);

            $blog = Blog::updateOrCreate(
                ['slug' => $blogData['slug']],
                $blogData
            );

            $tagIds = Tag::whereIn('slug', $tagSlugs)->pluck('id');

            if ($tagIds->isNotEmpty()) {
                $blog->tags()->sync($tagIds);
            }
        }
    }
}
