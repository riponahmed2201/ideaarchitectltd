<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedPlaceholderImage();

        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            ServiceCategorySeeder::class,
            ServiceSeeder::class,
            TagSeeder::class,
            SliderSeeder::class,
            PartnerSeeder::class,
            PortfolioSeeder::class,
            ProjectSeeder::class,
            BlogSeeder::class,
            VideosSeeder::class,
        ]);
    }

    private function seedPlaceholderImage(): void
    {
        $source = public_path('assets/logo/logo.png');

        if (file_exists($source)) {
            Storage::disk('public')->put('seed/placeholder.jpg', file_get_contents($source));
        }
    }
}
