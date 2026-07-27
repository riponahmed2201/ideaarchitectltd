<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $placeholder = 'seed/placeholder.jpg';

        $blogs = [
            [
                'title' => 'Modern Residential Design Trends in Dhaka',
                'slug' => 'modern-residential-design-trends-dhaka',
                'short_description' => 'Explore the latest residential architecture trends shaping homes in Dhaka.',
                'content' => '<p>Modern residential design in Dhaka focuses on natural light, open floor plans, and sustainable materials. Homeowners are increasingly looking for designs that balance aesthetics with functionality.</p>',
                'featured_image' => $placeholder,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'RAJUK Approval Process: A Complete Guide',
                'slug' => 'rajuk-approval-process-guide',
                'short_description' => 'Everything you need to know about getting RAJUK approval for your building project.',
                'content' => '<p>Getting RAJUK approval is a crucial step for any construction project in Dhaka. This guide walks you through the required documents, timelines, and common pitfalls to avoid.</p>',
                'featured_image' => $placeholder,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Interior Design Tips for Small Apartments',
                'slug' => 'interior-design-tips-small-apartments',
                'short_description' => 'Maximize space and style in your small apartment with these expert interior design tips.',
                'content' => '<p>Small apartments in Dhaka can feel spacious with the right design choices. Use multi-functional furniture, light colors, and smart storage solutions to create a comfortable living space.</p>',
                'featured_image' => $placeholder,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($blogs as $blogData) {
            $blog = Blog::updateOrCreate(
                ['slug' => $blogData['slug']],
                $blogData
            );

            $tagIds = Tag::inRandomOrder()->limit(2)->pluck('id');
            $blog->tags()->syncWithoutDetaching($tagIds);
        }
    }
}
