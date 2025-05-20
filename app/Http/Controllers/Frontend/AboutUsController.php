<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the about us.
     */
    public function index()
    {
        return view('frontend.pages.about.index');
    }
}
