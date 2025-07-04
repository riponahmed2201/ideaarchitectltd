<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the about us.
     */
    public function index()
    {
        $users = User::with('profile')->where('status', 1)->get();

        return view('frontend.pages.about.index', compact('users'));
    }
}
