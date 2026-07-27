<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $tags = [
            ['name' => 'Architecture', 'slug' => 'architecture', 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Interior Design', 'slug' => 'interior-design', 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Construction', 'slug' => 'construction', 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'RAJUK', 'slug' => 'rajuk', 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tips', 'slug' => 'tips', 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
        ];

        foreach ($tags as $tag) {
            Tag::updateOrCreate(
                ['slug' => $tag['slug']],
                $tag
            );
        }
    }
}
