<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()->where('status', 1)->latest()->paginate(12);

        return view('frontend.pages.projects.index', compact('projects'));
    }

    public function show(int $id)
    {
        $project = Project::query()->where('status', 1)->findOrFail($id);

        $relatedProjects = Project::query()
            ->where('status', 1)
            ->where('id', '!=', $project->id)
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.pages.projects.show', compact('project', 'relatedProjects'));
    }
}
