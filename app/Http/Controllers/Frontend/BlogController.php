<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::query()->where('status', 1)->latest()->paginate(12);

        return view('frontend.pages.blog.index', compact('blogs'));
    }

    public function show(string $slug)
    {
        $blog = Blog::with('tags')->where('status', 1)->where('slug', $slug)->firstOrFail();

        $recentBlogs = Blog::query()
            ->where('status', 1)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(5)
            ->get(['id', 'title', 'slug', 'created_at']);

        return view('frontend.pages.blog.show', compact('blog', 'recentBlogs'));
    }
}
