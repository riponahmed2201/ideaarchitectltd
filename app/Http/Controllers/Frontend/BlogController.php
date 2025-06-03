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
        $blogs = Blog::query()->where('status', 1)->latest()->paginate(12);

        return view('frontend.pages.blog.index', compact('blogs'));
    }

    /**
     * Display the specified blog post.
     */
    public function show(int $id)
    {
        $recentBlogs = Blog::query()->where('status', 1)->latest()->take(5)->get(['id', 'title', 'created_at']);

        $blog = Blog::with('tags')->where('id', $id)->latest()->first(['id', 'title', 'slug', 'short_description', 'content', 'featured_image', 'created_at']);

        return view('frontend.pages.blog.show', compact('blog', 'recentBlogs'));
    }
}
