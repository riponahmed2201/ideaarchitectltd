<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Tag;
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

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws Exception
     */
    public function index(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $searchKeyword = $request->input('search');
            $query = Blog::with('tags')
                ->when($searchKeyword, function ($q) use ($searchKeyword) {
                    $q->where(function ($q) use ($searchKeyword) {
                        $q->where('name', 'LIKE', "%$searchKeyword%")
                            ->orWhere('short_description', 'LIKE', "%$searchKeyword%")
                            ->orWhere('content', 'LIKE', "%$searchKeyword%")
                            ->orWhere('status', 'LIKE', "%$searchKeyword%");
                    });
                })
                ->latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('featured_image', function ($row) {
                    if ($row->featured_image) {
                        $url = Storage::url($row->featured_image);
                        return '<img src="' . $url . '" alt="Blog Image" width="60" height="60">';
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
                    return '<a href="' . route('admin.blogs.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                })
                ->rawColumns(['action', 'status', 'featured_image'])
                ->make(true);
        }

        return view('admin.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tags = Tag::query()->latest()->get(['id', 'name']);
        return view('admin.blogs.form', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $input['slug'] = Str::slug($input['title']);

        $featuredImage = $request->file('featured_image');

        if ($featuredImage) {
            $featuredImageName = md5(Str::random(10) . time()) . '.' . $featuredImage->getClientOriginalExtension();
            $featuredImagePath = $featuredImage->storeAs('blogs', $featuredImageName, 'public');
            $input['featured_image'] = $featuredImagePath;
        }

        DB::beginTransaction();
        try {

            $blog = Blog::query()->create($input);

            // Attach tags (many-to-many)
            if (!empty($input['tags'])) {
                $blog->tags()->attach($input['tags']);
            }

            DB::commit();

            notify()->success("Blog created successfully.", "Success");
            return to_route('admin.blogs.index');
        } catch (Exception $exception) {
            DB::rollBack();

            // If a featured_image was uploaded, delete the file to prevent orphaned files
            if (isset($input['featured_image']) && Storage::disk('public')->exists($input['featured_image'])) {
                Storage::disk('public')->delete($input['featured_image']);
            }

            notify()->error("Failed to create blog", "Error");
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog): View
    {
        $tags = Tag::query()->latest()->get(['id', 'name']);
        return view('admin.blogs.form', ['editModeData' => $blog, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog): RedirectResponse
    {
        $input = $request->validated();

        $input['slug'] = Str::slug($input['title']);

        // Check if a new logo is being uploaded
        $featuredImage = $request->file('featured_image');

        if ($featuredImage) {
            $featuredImageName = md5(Str::random(10) . time()) . '.' . $featuredImage->getClientOriginalExtension();
            $featuredImagePath = $featuredImage->storeAs('blogs', $featuredImageName, 'public');
            $input['featured_image'] = $featuredImagePath;

            // Delete the old featured_image if it exists
            if ($blog->featured_image && Storage::disk('public')->exists($blog->featured_image)) {
                Storage::disk('public')->delete($blog->featured_image);
            }
        }

        DB::beginTransaction();
        try {

            $blog->update($input);

            $blog->tags()->sync($input['tags'] ?? []);
            DB::commit();
            notify()->success("Blog updated successfully.", "Success");
            return to_route('admin.blogs.index');
        } catch (Exception $exception) {
            DB::rollBack();

            // If an featured_image was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($input['featured_image']) && Storage::disk('public')->exists($input['featured_image'])) {
                Storage::disk('public')->delete($input['featured_image']);
            }

            notify()->error("Failed to update blog", "Error");
            return back();
        }
    }
}
