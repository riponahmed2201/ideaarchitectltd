<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'role' => 'admin',
                'status' => 1,
                'password' => Hash::make('password'),
            ]
        );

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'designation' => 'Managing Director',
                'phone' => '01732691745',
                'about_me' => 'Leads operations, client relations, and project delivery at Idea Architect Limited.',
                'picture' => null,
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'linkedin' => 'https://linkedin.com',
                'instagram' => 'https://instagram.com',
            ]
        );
    }
}
