<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

if (! function_exists('site_setting')) {
    function site_setting(string $key, mixed $default = null): mixed
    {
        return Setting::get($key, $default);
    }
}

if (! function_exists('getServiceCategories')) {
    function getServiceCategories()
    {
        return \App\Models\ServiceCategory::withCount('services')->where('status', 1)->get();
    }
}

if (! function_exists('getServices')) {
    function getServices()
    {
        return \App\Models\Service::with('category')->where('status', 1)->get();
    }
}

if (! function_exists('getClients')) {
    function getClients()
    {
        return \App\Models\Client::where('status', 1)->latest()->get();
    }
}

if (! function_exists('getLoggedInUser')) {
    function getLoggedInUser()
    {
        return \Illuminate\Support\Facades\Auth::user()->load('profile');
    }
}
