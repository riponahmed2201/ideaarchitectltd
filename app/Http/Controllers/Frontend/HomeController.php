<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Portfolio;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $serviceCategories = ServiceCategory::query()->where('status', 1)->get();
        $sliders = Slider::query()->where('status', 1)->latest()->get();

        $featuredPortfolios = Portfolio::with('service')
            ->where('status', 1)
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        if ($featuredPortfolios->isEmpty()) {
            $featuredPortfolios = Portfolio::with('service')
                ->where('status', 1)
                ->latest()
                ->take(6)
                ->get();
        }

        $testimonials = Testimonial::with('portfolio')
            ->where('status', 1)
            ->latest()
            ->take(6)
            ->get();

        $teamMembers = User::with('profile')
            ->where('status', 1)
            ->latest()
            ->take(6)
            ->get();

        $counters = [
            'total_projects' => Portfolio::where('status', 1)->count(),
            'finished_projects' => Portfolio::where('status', 1)->where('status_type', 'finished')->count(),
            'satisfied_clients' => Client::where('status', 1)->count() ?: Portfolio::where('status', 1)->distinct('client_name')->count('client_name'),
            'awards' => (int) Setting::get('awards_count', 12),
        ];

        return view('frontend.home', compact('serviceCategories', 'sliders', 'featuredPortfolios', 'testimonials', 'teamMembers', 'counters'));
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
