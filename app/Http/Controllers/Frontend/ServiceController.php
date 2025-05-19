<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
     /**
     * Display a listing of the services.
     */
    public function index()
    {
        return view('frontend.pages.services.index');
    }

    /**
     * Display the specified services.
     */
    public function show(int $id)
    {
        return view('frontend.pages.services.show', ['id' => $id]);
    }
}
