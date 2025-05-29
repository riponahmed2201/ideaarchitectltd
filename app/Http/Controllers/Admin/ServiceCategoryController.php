<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceCategoryRequest;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws Exception
     */
    public function index(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $searchKeyword = $request->input('search');
            $query = ServiceCategory::select(['id', 'name', 'slug', 'description', 'status', 'created_at'])
                ->when($searchKeyword, function ($q) use ($searchKeyword) {
                    $q->where(function ($q) use ($searchKeyword) {
                        $q->where('name', 'LIKE', "%$searchKeyword%")
                            ->orWhere('description', 'LIKE', "%$searchKeyword%")
                            ->orWhere('status', 'LIKE', "%$searchKeyword%");
                    });
                })
                ->latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return $row->status
                        ? '<div class="badge badge-light-success fw-bolder">Active</div>'
                        : '<div class="badge badge-light-danger fw-bolder">Inactive</div>';
                })
                ->addColumn('created_at', fn($row) => Carbon::parse($row->created_at)->diffForHumans())
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('admin.service-categories.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('admin.service_categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.service_categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceCategoryRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $input['slug'] = Str::slug($input['name']);

        try {
            ServiceCategory::query()->create($input);
            notify()->success("Service category created successfully.", "Success");
            return to_route('admin.service-categories.index');
        } catch (Exception $exception) {
            notify()->error("Failed to create service category", "Error");
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCategory $serviceCategory): View
    {
        return view('admin.service_categories.form', ['editModeData' => $serviceCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceCategoryRequest $request, ServiceCategory $serviceCategory): RedirectResponse
    {
        $input = $request->validated();
        $input['slug'] = Str::slug($input['name']);

        try {
            $serviceCategory->update($input);
            notify()->success("Service category updated successfully.", "Success");
            return to_route('admin.service-categories.index');
        } catch (Exception $exception) {
            notify()->error("Failed to update service category", "Error");
            return back();
        }
    }
}
