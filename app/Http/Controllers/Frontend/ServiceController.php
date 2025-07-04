<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index($serviceCategorySlug = null)
    {
        $serviceQuery = Service::with('category')->where('status', 1);

        if ($serviceCategorySlug) {
            $serviceCategory = ServiceCategory::where('slug', $serviceCategorySlug)->first();

            if ($serviceCategory) {
                $serviceQuery->where('service_category_id', $serviceCategory->id);
            } else {
                // Optional: handle invalid slug (e.g., return 404 or redirect)
                abort(404, 'Service category not found.');
            }
        }

        $services = $serviceQuery->get();

        return view('frontend.pages.services.index', compact('services'));
    }

    /**
     * Display the specified services.
     */
    public function show($categorySlug = null, $serviceSlug = null)
    {
        //Get active service list for left sidebar filtering
        $services = Service::with('category')->where('status', 1)->get();

        $serviceInfo = Service::query()->where('slug', $serviceSlug)->first();

        $portfolios = Portfolio::with('service')->where('service_id', $serviceInfo->id)->latest()->get();

        return view('frontend.pages.services.show', compact('services', 'serviceInfo', 'portfolios'));
    }
}
