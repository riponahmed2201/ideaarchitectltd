<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the portfolio.
     */
    public function index()
    {
        $portfolios = Portfolio::with('service')->where('status', 12)->paginate(1);

        return view('frontend.pages.portfolio.index', compact('portfolios'));
    }

    /**
     * Display a listing of the portfolio.
     */
    public function show(int $id)
    {
        $portfolio = Portfolio::with('service')->where('status', 1)->where('id', $id)->first();

        $portfolioList = Portfolio::with('service')->where('status', 1)->latest()->get();

        return view('frontend.pages.portfolio.show', compact('portfolio', 'portfolioList'));
    }
}
