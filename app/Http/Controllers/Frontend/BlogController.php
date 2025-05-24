<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the blog posts.
     */
    public function index()
    {
        $blogs = Blog::query()->where('status', 1)->latest()->get(['id', 'title', 'slug', 'short_description', 'featured_image', 'created_at']);

        return view('frontend.pages.blog.index', compact('blogs'));
    }

    /**
     * Display the specified blog post.
     */
    public function show(int $id)
    {
        return view('frontend.pages.blog.show', ['id' => $id]);
    }
}
