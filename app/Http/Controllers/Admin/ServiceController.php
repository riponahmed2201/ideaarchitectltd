<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceCategory;
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

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws Exception
     */
    public function index(Request $request): JsonResponse|View
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
                        $url = Storage::url($row->image);;
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
                    $editUrl = route('admin.services.edit', $row->id);
                    $viewUrl = route('admin.services.show', $row->id);

                    return view('admin.services.partials.actions', compact('editUrl', 'viewUrl'))->render();
                })
                ->rawColumns(['action', 'status', 'image']) // Make sure image is marked raw
                ->make(true);
        }

        return view('admin.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $serviceCategories = ServiceCategory::query()->latest()->get(['id', 'name']);
        return view('admin.services.form', compact('serviceCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $input['slug'] = Str::slug($input['name']);

        $image = $request->file('image');

        if ($image) {
            $imageName = md5(Str::random(10) . time()) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('services', $imageName, 'public');
            $input['image'] = $imagePath;
        }

        DB::beginTransaction();
        try {
            Service::query()->create($input);
            DB::commit();
            notify()->success("Service created successfully.", "Success");
            return to_route('admin.services.index');
        } catch (Exception $exception) {
            DB::rollBack();
            // If an image was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($input['image']) && Storage::disk('public')->exists($input['image'])) {
                Storage::disk('public')->delete($input['image']);
            }
            notify()->error("Something went wrong! Please try again.", "Error");
            return back();
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function show(Service $service): View
    {
        $service = $service->with('category')->first();
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service): View
    {
        $serviceCategories = ServiceCategory::query()->latest()->get(['id', 'name']);
        return view('admin.services.form', ['editModeData' => $service, 'serviceCategories' => $serviceCategories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        $input = $request->validated();
        $input['slug'] = Str::slug($input['name']);

        // Check if a new logo is being uploaded
        $image = $request->file('image');

        if ($image) {
            $imageName = md5(Str::random(10) . time()) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('services', $imageName, 'public');
            $input['image'] = $imagePath;

            // Delete the old image if it exists
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }
        }

        DB::beginTransaction();
        try {
            $service->update($input);
            notify()->success("Service updated successfully.", "Success");
            DB::commit();
            return to_route('admin.services.index');
        } catch (Exception $exception) {
            DB::rollBack();

            // If an image was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($input['image']) && Storage::disk('public')->exists($input['image'])) {
                Storage::disk('public')->delete($input['image']);
            }

            notify()->error("Something went wrong! Please try again.", "Error");
            return back();
        }
    }
}
