<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
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

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $searchKeyword = $request->input('search');
            $query = Slider::query()
                ->when($searchKeyword, function ($q) use ($searchKeyword) {
                    $q->where(function ($q) use ($searchKeyword) {
                        $q->where('name', 'LIKE', "%$searchKeyword%")
                            ->orWhere('short_description', 'LIKE', "%$searchKeyword%")
                            ->orWhere('status', 'LIKE', "%$searchKeyword%");
                    });
                })
                ->latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        $url = Storage::url($row->image);
                        return '<img src="' . $url . '" alt="Slider Image" width="60" height="60">';
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
                    $editUrl = route('admin.sliders.edit', $row->id);
                    $deleteUrl = route('admin.sliders.destroy', $row->id);

                    return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '" data-url="' . $deleteUrl . '">Delete</button>
                    ';
                })
                ->rawColumns(['action', 'status', 'image'])
                ->make(true);
        }

        return view('admin.sliders.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request): RedirectResponse
    {
        $input = $request->validated();

        $image = $request->file('image');

        if ($image) {
            $imageName = md5(Str::random(10) . time()) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('sliders', $imageName, 'public');
            $input['image'] = $imagePath;
        }

        try {

            Slider::query()->create($input);

            notify()->success("Slider created successfully.", "Success");
            return to_route('admin.sliders.index');
        } catch (Exception $exception) {

            // If a image was uploaded, delete the file to prevent orphaned files
            if (isset($input['image']) && Storage::disk('public')->exists($input['image'])) {
                Storage::disk('public')->delete($input['image']);
            }

            notify()->error("Failed to create slider", "Error");
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.form', ['editModeData' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider): RedirectResponse
    {
        $input = $request->validated();

        // Check if a new logo is being uploaded
        $image = $request->file('image');

        if ($image) {
            $imageName = md5(Str::random(10) . time()) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('sliders', $imageName, 'public');
            $input['image'] = $imagePath;

            // Delete the old image if it exists
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }
        }

        try {

            $slider->update($input);
            notify()->success("Slider updated successfully.", "Success");
            return to_route('admin.sliders.index');
        } catch (Exception $exception) {

            // If an image was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($input['image']) && Storage::disk('public')->exists($input['image'])) {
                Storage::disk('public')->delete($input['image']);
            }

            notify()->error("Failed to update slider", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        try {
            // Delete the image from storage if it exists
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }

            $slider->delete();

            return response()->json(['success' => true, 'statusCode' => 200, 'message' => 'Slider deleted successfully.']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'statusCode' => 500, 'message' => 'Failed to delete slider.']);
        }
    }
}
