<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the contact us.
     */
    public function index()
    {
        return view('frontend.pages.contact.index');
    }
}
