<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->where('status', 1)->get();
        $serviceCategories = ServiceCategory::query()->where('status', 1)->get();

        return view('frontend.home', compact('services', 'serviceCategories'));
    }

    public function privacyPolicy()
    {
        return view('frontend.pages.privacyPolicy.index');
    }
}
