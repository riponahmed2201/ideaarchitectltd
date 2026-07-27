<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        $settings = [
            'site_name' => Setting::get('site_name', 'Idea Architect Limited'),
            'site_email' => Setting::get('site_email', 'idea.architectsbd@gmail.com'),
            'site_phone_1' => Setting::get('site_phone_1', '+8801732-691745'),
            'site_phone_2' => Setting::get('site_phone_2', '+8801738-275126'),
            'site_address' => Setting::get('site_address', 'Mirpur - 6, Dhaka-1216, Bangladesh'),
            'whatsapp_number' => Setting::get('whatsapp_number', '8801841275126'),
            'awards_count' => Setting::get('awards_count', 12),
            'google_analytics_id' => Setting::get('google_analytics_id', ''),
            'meta_pixel_id' => Setting::get('meta_pixel_id', ''),
            'default_locale' => Setting::get('default_locale', 'en'),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(SettingRequest $request)
    {
        foreach ($request->validated() as $key => $value) {
            Setting::set($key, $value);
        }

        notify()->success('Settings updated successfully.', 'Success');

        return back();
    }
}
