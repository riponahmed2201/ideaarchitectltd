<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->where('status', 1)->get();
        $serviceCategories = ServiceCategory::query()->where('status', 1)->get();
        $videos = Video::query()->where('status', 1)->latest()->get();
        $sliders = Slider::query()->where('status', 1)->latest()->get();

        $counters = [
            'running_projects' => Project::where('status', 1)->where('type', 'running')->count(),
            'finished_projects' => Project::where('status', 1)->where('type', 'finished')->count(),
            'satisfied_clients' => Partner::where('status', 1)->count() ?: Portfolio::where('status', 1)->distinct('client_name')->count('client_name'),
            'awards' => (int) Setting::get('awards_count', 12),
        ];

        return view('frontend.home', compact('services', 'serviceCategories', 'videos', 'sliders', 'counters'));
    }

    public function privacyPolicy()
    {
        return view('frontend.pages.privacyPolicy.index');
    }

    public function videoGallery()
    {
        $videos = Video::query()->where('status', 1)->latest()->paginate(12);

        return view('frontend.pages.video-gallery.index', compact('videos'));
    }
}
