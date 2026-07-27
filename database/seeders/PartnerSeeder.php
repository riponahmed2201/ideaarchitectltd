<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $placeholder = 'seed/placeholder.jpg';

        $partners = [
            ['name' => 'ABC Developers', 'description' => 'Real estate development partner', 'logo' => $placeholder, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Green Build Ltd', 'description' => 'Sustainable construction partner', 'logo' => $placeholder, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Urban Living Co', 'description' => 'Residential project partner', 'logo' => $placeholder, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Metro Interiors', 'description' => 'Interior furnishing partner', 'logo' => $placeholder, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
        ];

        foreach ($partners as $partner) {
            Partner::updateOrCreate(
                ['name' => $partner['name']],
                $partner
            );
        }
    }
}
