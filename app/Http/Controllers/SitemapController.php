<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [
            ['loc' => url('/'), 'priority' => '1.0'],
            ['loc' => url('/about-us'), 'priority' => '0.8'],
            ['loc' => url('/portfolio'), 'priority' => '0.8'],
            ['loc' => url('/projects'), 'priority' => '0.8'],
            ['loc' => url('/blog'), 'priority' => '0.8'],
            ['loc' => url('/video-gallery'), 'priority' => '0.7'],
            ['loc' => url('/contact-us'), 'priority' => '0.7'],
            ['loc' => url('/privacy-policy'), 'priority' => '0.5'],
        ];

        foreach (ServiceCategory::where('status', 1)->get() as $category) {
            $urls[] = ['loc' => route('services.index', $category->slug), 'priority' => '0.7'];
        }

        foreach (Service::where('status', 1)->with('category')->get() as $service) {
            if ($service->category) {
                $urls[] = ['loc' => route('services.show', [$service->category->slug, $service->slug]), 'priority' => '0.7'];
            }
        }

        foreach (Blog::where('status', 1)->get() as $blog) {
            $urls[] = ['loc' => route('blog.show', $blog->slug), 'priority' => '0.6'];
        }

        foreach (Portfolio::where('status', 1)->get() as $portfolio) {
            $urls[] = ['loc' => route('portfolio.show', $portfolio->slug), 'priority' => '0.6'];
        }

        foreach (Project::where('status', 1)->get() as $project) {
            $urls[] = ['loc' => route('projects.show', $project->id), 'priority' => '0.6'];
        }

        return response()->view('sitemap', compact('urls'))->header('Content-Type', 'application/xml');
    }
}
