<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('service')->where('status', 1)->latest()->paginate(12);

        return view('frontend.pages.portfolio.index', compact('portfolios'));
    }

    public function show(string $slug)
    {
        $portfolio = Portfolio::with('service')->where('status', 1)->where('slug', $slug)->firstOrFail();

        $portfolioList = Portfolio::with('service')
            ->where('status', 1)
            ->where('id', '!=', $portfolio->id)
            ->latest()
            ->get();

        return view('frontend.pages.portfolio.show', compact('portfolio', 'portfolioList'));
    }
}
