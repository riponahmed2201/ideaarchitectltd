<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Concerns\SeedsImages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeamMemberSeeder extends Seeder
{
    use SeedsImages;

    public function run(): void
    {
        $members = [
            [
                'name' => 'Ar. Md. Kamrul Hasan',
                'email' => 'kamrul@ideaarchitectltd.com',
                'role' => 'staff',
                'designation' => 'Principal Architect',
                'phone' => '01711223344',
                'about_me' => '15+ years of experience in residential and commercial architecture across Dhaka. Leads design development, RAJUK coordination, and client presentations.',
                'image' => $this->seedImage('team-kamrul.jpg', $this->unsplash('photo-1560250097-0b93528c311a', 600, 600)),
            ],
            [
                'name' => 'Farhana Akter',
                'email' => 'farhana@ideaarchitectltd.com',
                'role' => 'staff',
                'designation' => 'Senior Interior Designer',
                'phone' => '01822334455',
                'about_me' => 'Specializes in luxury apartment and office interiors with a focus on space planning, material selection, and 3D visualization.',
                'image' => $this->seedImage('team-farhana.jpg', $this->unsplash('photo-1573496359142-b8d87734a5a2', 600, 600)),
            ],
            [
                'name' => 'Syed Rafiqul Islam',
                'email' => 'rafiq@ideaarchitectltd.com',
                'role' => 'staff',
                'designation' => 'Project Manager',
                'phone' => '01933445566',
                'about_me' => 'Manages on-site execution, vendor coordination, and quality control to deliver projects on schedule without compromising finish.',
                'image' => $this->seedImage('team-rafiq.jpg', $this->unsplash('photo-1472099645785-5658abf4ff4e', 600, 600)),
            ],
        ];

        foreach ($members as $member) {
            $user = User::updateOrCreate(
                ['email' => $member['email']],
                [
                    'name' => $member['name'],
                    'role' => $member['role'],
                    'status' => 1,
                    'password' => Hash::make('password'),
                ]
            );

            $user->profile()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'designation' => $member['designation'],
                    'phone' => $member['phone'],
                    'about_me' => $member['about_me'],
                    'picture' => $member['image'],
                    'facebook' => 'https://www.facebook.com/iab2021',
                    'linkedin' => 'https://www.linkedin.com/',
                    'instagram' => 'https://instagram.com/',
                ]
            );
        }
    }
}
