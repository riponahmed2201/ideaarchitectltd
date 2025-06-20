<?php

use App\Models\Partner;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getServiceCategories')) {

    /**
     * Get active service categories
     *
     * @param
     * @return
     */
    function getServiceCategories()
    {
        return ServiceCategory::withCount('services')->where('status', 1)->get();
    }
}

if (!function_exists('getServices')) {

    /**
     * Get active services
     *
     * @param
     * @return
     */
    function getServices()
    {
        return Service::with('category')->where('status', 1)->get();
    }
}

if (!function_exists('getPartners')) {

    /**
     * Get active partners
     *
     * @param
     * @return
     */
    function getPartners()
    {
        return Partner::where('status', 1)->latest()->get();
    }
}

if (!function_exists('getLoggedInUser')) {

    /**
     * Get logged in user details
     *
     * @param
     * @return
     */
    function getLoggedInUser()
    {
        return Auth::user()->load('profile');
    }
}
