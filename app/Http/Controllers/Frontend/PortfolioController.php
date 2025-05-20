<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
        /**
     * Display a listing of the portfolio.
     */
    public function index()
    {
        return view('frontend.pages.portfolio.index');
    }
}
