<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $placeholder = 'seed/placeholder.jpg';

        $clients = [
            ['name' => 'ABC Developers', 'description' => 'Real estate development client', 'logo' => $placeholder, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Green Build Ltd', 'description' => 'Sustainable construction client', 'logo' => $placeholder, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Urban Living Co', 'description' => 'Residential project client', 'logo' => $placeholder, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Metro Interiors', 'description' => 'Interior furnishing client', 'logo' => $placeholder, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(
                ['name' => $client['name']],
                $client
            );
        }
    }
}
