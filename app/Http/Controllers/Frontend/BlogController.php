<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the blog posts.
     */
    public function index()
    {
        return view('frontend.pages.blog.index');
    }

    /**
     * Display the specified blog post.
     */
    public function show(int $id)
    {
        return view('frontend.pages.blog.show', ['id' => $id]);
    }
}
