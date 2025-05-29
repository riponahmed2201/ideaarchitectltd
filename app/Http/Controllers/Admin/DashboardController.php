<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'serviceCount' => Service::count(),
            'partnerCount' => Partner::count(),
            'blogCount' => Blog::count(),
            'serviceCategoryCount' => ServiceCategory::count(),
            'portfolioCount' => Portfolio::count(),
            'tagCount' => Tag::count(),
        ];

        return view('admin.dashboard', $counts);
    }
}
