<?php

namespace Database\Seeders;

use App\Models\Client;
use Database\Seeders\Concerns\SeedsImages;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    use SeedsImages;

    public function run(): void
    {
        Client::whereIn('name', [
            'ABC Developers',
            'Green Build Ltd',
            'Metro Interiors',
        ])->delete();

        $now = now();

        $clients = [
            [
                'name' => 'Sheltech Group',
                'description' => 'Long-term partner for multi-storey residential developments in Mirpur and Uttara.',
                'logo' => $this->seedAvatar('client-sheltech.png', 'Sheltech', '1a1d4a', 'f58220'),
            ],
            [
                'name' => 'Concord Real Estate',
                'description' => 'Commercial tower facade and lobby interior projects in Banani.',
                'logo' => $this->seedAvatar('client-concord.png', 'Concord', '3e4095', 'ffffff'),
            ],
            [
                'name' => 'Asset Property Development',
                'description' => 'Premium villa and duplex design consultancy in Gulshan.',
                'logo' => $this->seedAvatar('client-asset.png', 'Asset', 'f58220', '1a1d4a'),
            ],
            [
                'name' => 'Bengal Builders Ltd',
                'description' => 'Turnkey construction and interior fit-out for mid-rise apartment projects.',
                'logo' => $this->seedAvatar('client-bengal.png', 'Bengal', '2d3561', 'ffffff'),
            ],
            [
                'name' => 'Prime Holdings',
                'description' => 'Corporate office renovation and workspace planning across Dhaka.',
                'logo' => $this->seedAvatar('client-prime.png', 'Prime', '1a1d4a', 'f0a45c'),
            ],
            [
                'name' => 'Urban Living Co.',
                'description' => 'Residential complex planning, landscaping, and community space design.',
                'logo' => $this->seedAvatar('client-urban.png', 'Urban', '3e4095', 'f58220'),
            ],
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(
                ['name' => $client['name']],
                array_merge($client, [
                    'status' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ])
            );
        }
    }
}
