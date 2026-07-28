<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->ensureSeedDirectory();

        $this->call([
            UserSeeder::class,
            TeamMemberSeeder::class,
            SettingSeeder::class,
            ServiceCategorySeeder::class,
            ServiceSeeder::class,
            TagSeeder::class,
            SliderSeeder::class,
            ClientSeeder::class,
            PortfolioSeeder::class,
            BlogSeeder::class,
            FaqSeeder::class,
            TestimonialSeeder::class,
            VideosSeeder::class,
        ]);
    }

    private function ensureSeedDirectory(): void
    {
        Storage::disk('public')->makeDirectory('seed');

        $placeholder = 'seed/placeholder.jpg';
        $source = public_path('assets/logo/logo.png');

        if (! Storage::disk('public')->exists($placeholder) && file_exists($source)) {
            Storage::disk('public')->put($placeholder, file_get_contents($source));
        }
    }
}
