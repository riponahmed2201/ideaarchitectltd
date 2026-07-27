<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::query()->where('status', 1)->orderBy('sort_order')->get();

        return view('frontend.pages.faq.index', compact('faqs'));
    }
}
