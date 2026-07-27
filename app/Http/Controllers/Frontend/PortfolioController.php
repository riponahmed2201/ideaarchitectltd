<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $activeFilter = $request->get('type', 'all');

        $portfolios = Portfolio::with('service')
            ->where('status', 1)
            ->when($activeFilter !== 'all', fn ($q) => $q->where('space_type', $activeFilter))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('frontend.pages.portfolio.index', compact('portfolios', 'activeFilter'));
    }

    public function show(string $slug)
    {
        $portfolio = Portfolio::with('service')->where('status', 1)->where('slug', $slug)->firstOrFail();

        $portfolioList = Portfolio::with('service')
            ->where('status', 1)
            ->where('id', '!=', $portfolio->id)
            ->when($portfolio->space_type, fn ($q) => $q->where('space_type', $portfolio->space_type))
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.pages.portfolio.show', compact('portfolio', 'portfolioList'));
    }
}
