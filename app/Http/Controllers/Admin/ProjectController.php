<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $searchKeyword = $request->input('search');
            $query = Project::query()
                ->when($searchKeyword, function ($q) use ($searchKeyword) {
                    $q->where(function ($q) use ($searchKeyword) {
                        $q->where('title', 'LIKE', "%$searchKeyword%")
                            ->orWhere('description', 'LIKE', "%$searchKeyword%")
                            ->orWhere('location', 'LIKE', "%$searchKeyword%")
                            ->orWhere('date', 'LIKE', "%$searchKeyword%");
                    });
                })
                ->latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        $url = Storage::url($row->image);;
                        return '<img src="' . $url . '" alt="Project Image" width="60" height="60">';
                    }
                    return '<span class="badge badge-light">No Image</span>';
                })
                ->addColumn('status', function ($row) {
                    return $row->status
                        ? '<div class="badge badge-light-success fw-bolder">Active</div>'
                        : '<div class="badge badge-light-danger fw-bolder">Inactive</div>';
                })
                ->addColumn('created_at', fn($row) => Carbon::parse($row->created_at)->diffForHumans())
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.projects.edit', $row->id);

                    return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>';
                })
                ->rawColumns(['action', 'status', 'image']) // Make sure image is marked raw
                ->make(true);
        }

        return view('admin.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request): RedirectResponse
    {
        $input = $request->validated();

        $image = $request->file('image');

        if ($image) {
            $imageName = md5(Str::random(10) . time()) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('projects', $imageName, 'public');
            $input['image'] = $imagePath;
        }

        try {
            Project::query()->create($input);
            notify()->success("Project created successfully.", "Success");
            return to_route('admin.projects.index');
        } catch (Exception $exception) {

            dd($exception);
            // If a image was uploaded, delete the file to prevent orphaned files
            if (isset($input['image']) && Storage::disk('public')->exists($input['image'])) {
                Storage::disk('public')->delete($input['image']);
            }

            notify()->error("Failed to create project", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.form', ['editModeData' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project): RedirectResponse
    {
        $input = $request->validated();

        // Check if a new logo is being uploaded
        $image = $request->file('image');

        if ($image) {
            $imageName = md5(Str::random(10) . time()) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('projects', $imageName, 'public');
            $input['image'] = $imagePath;

            // Delete the old image if it exists
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
        }

        try {
            $project->update($input);
            notify()->success("Project updated successfully.", "Success");
            return to_route('admin.projects.index');
        } catch (Exception $exception) {

            // If an image was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($input['image']) && Storage::disk('public')->exists($input['image'])) {
                Storage::disk('public')->delete($input['image']);
            }

            notify()->error("Failed to update project", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
