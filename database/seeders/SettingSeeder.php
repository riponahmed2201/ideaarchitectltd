<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'Idea Architect Limited',
            'site_email' => 'idea.architectsbd@gmail.com',
            'site_phone_1' => '+8801732-691745',
            'site_phone_2' => '+8801738-275126',
            'site_address' => 'Mirpur - 6, Dhaka-1216, Bangladesh',
            'whatsapp_number' => '8801841275126',
            'awards_count' => '12',
            'google_analytics_id' => '',
            'meta_pixel_id' => '',
            'default_locale' => 'en',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
