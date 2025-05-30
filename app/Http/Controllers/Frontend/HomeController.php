<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->where('status', 1)->get();
        $serviceCategories = ServiceCategory::query()->where('status', 1)->get();
        $videos = Video::query()->where('status', 1)->get();

        return view('frontend.home', compact('services', 'serviceCategories', 'videos'));
    }

    public function privacyPolicy()
    {
        return view('frontend.pages.privacyPolicy.index');
    }
}
