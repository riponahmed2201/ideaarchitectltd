<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'status' => 1,
            'password' => Hash::make('password'),
        ]);

        $user->profile()->create([
            'phone' => '0123456789',
            'about_me' => 'I am the system admin.',
            'picture' => null,
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'linkedin' => 'https://linkedin.com',
            'instagram' => 'https://instagram.com',
        ]);
    }
}
