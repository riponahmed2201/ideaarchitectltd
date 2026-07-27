<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index($serviceCategorySlug = null)
    {
        $serviceQuery = Service::with('category')->where('status', 1);

        if ($serviceCategorySlug) {
            $serviceCategory = ServiceCategory::where('slug', $serviceCategorySlug)->firstOrFail();
            $serviceQuery->where('service_category_id', $serviceCategory->id);
        }

        $services = $serviceQuery->get();

        return view('frontend.pages.services.index', compact('services'));
    }

    public function show($categorySlug = null, $serviceSlug = null)
    {
        $services = Service::with('category')->where('status', 1)->get();

        $serviceInfo = Service::query()->where('slug', $serviceSlug)->firstOrFail();

        $portfolios = Portfolio::with('service')->where('service_id', $serviceInfo->id)->where('status', 1)->latest()->get();

        return view('frontend.pages.services.show', compact('services', 'serviceInfo', 'portfolios'));
    }
}
