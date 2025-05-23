<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchKeyword = $request->input('search');
            $query = Service::with('category')
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

                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        $url = asset('uploads/services/' . $row->image);
                        return '<img src="' . $url . '" alt="Service Image" width="60" height="60">';
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
                    return '<a href="' . route('admin.services.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                })

                ->rawColumns(['action', 'status', 'image']) // Make sure image is marked raw
                ->make(true);
        }

        return view('admin.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $serviceCategories = ServiceCategory::latest()->get(['id', 'name']);

        return view('admin.services.form', compact('serviceCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $input = $request->validated();

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/services'), $imageName);
        }

        try {
            Service::create([
                'name' => $input['name'],
                'status' => $input['status'],
                'description' => $input['description'],
                'service_category_id' => $input['service_category_id'],
                'image' => $imageName,
            ]);

            notify()->success("Service created successfully.", "Success");
            return to_route('admin.services.index');
        } catch (Exception $exception) {
            notify()->error("Something went wrong! Please try again.", "Error");
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $serviceCategories = ServiceCategory::latest()->get(['id', 'name']);

        return view('admin.services.form', ['editModeData' => $service, 'serviceCategories' => $serviceCategories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $input = $request->validated();

        $imageName = $service->image;
        if ($request->hasFile('image')) {
            if ($service->image && file_exists(public_path('uploads/services/' . $service->image))) {
                unlink(public_path('uploads/services/' . $service->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/services'), $imageName);
        }

        try {
            $service->update([
                'name' => $input['name'],
                'status' => $input['status'],
                'description' => $input['description'],
                'service_category_id' => $input['service_category_id'],
                'image' => $imageName,
            ]);
            notify()->success("Service updated successfully.", "Success");
            return to_route('admin.services.index');
        } catch (Exception $exception) {
            notify()->error("Something went wrong! Please try again.", "Error");
            return back();
        }
    }
}
