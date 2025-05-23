<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceCategoryRequest;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Exception;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchKeyword = $request->input('search');
            $query = ServiceCategory::select(['id', 'name', 'description', 'status', 'created_at'])
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
    public function create()
    {
        return view('admin.service_categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceCategoryRequest $request)
    {
        try {
            ServiceCategory::create($request->validated());

            notify()->success("Service created successfully.", "Success");
            return redirect()->route('admin.service-categories.index');
        } catch (Exception $e) {
            notify()->error("Something went wrong. Please try again.", "Error");
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        return view('admin.service_categories.form', ['editModeData' => $serviceCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceCategoryRequest $request, ServiceCategory $serviceCategory)
    {
        try {
            $serviceCategory->update($request->validated());

            notify()->success("Service updated successfully.", "Success");
            return redirect()->route('admin.service-categories.index');
        } catch (Exception $e) {
            notify()->error("Something went wrong. Please try again.", "Error");
            return back()->withInput();
        }
    }
}
