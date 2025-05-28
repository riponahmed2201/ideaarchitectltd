<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use App\Models\Service;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $searchKeyword = $request->input('search');
            $query = Portfolio::with('service')
                ->when($searchKeyword, function ($q) use ($searchKeyword) {
                    $q->where(function ($q) use ($searchKeyword) {
                        $q->where('title', 'LIKE', "%$searchKeyword%")
                            ->orWhere('description', 'LIKE', "%$searchKeyword%")
                            ->orWhere('client_name', 'LIKE', "%$searchKeyword%")
                            ->orWhere('date', 'LIKE', "%$searchKeyword%");
                    });
                })
                ->latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        $url = Storage::url($row->image);;
                        return '<img src="' . $url . '" alt="Portfolio Image" width="60" height="60">';
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
                    $editUrl = route('admin.portfolios.edit', $row->id);
                    $deleteUrl = route('admin.portfolios.destroy', $row->id);

                    return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '" data-url="' . $deleteUrl . '">Delete</button>
                    ';
                })
                ->rawColumns(['action', 'status', 'image']) // Make sure image is marked raw
                ->make(true);
        }

        return view('admin.portfolios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::query()->latest()->get(['id', 'name']);
        return view('admin.portfolios.form', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest $request): RedirectResponse
    {
        $input = $request->validated();

        $image = $request->file('image');

        if ($image) {
            $imageName = md5(Str::random(10) . time()) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('portfolios', $imageName, 'public');
            $input['image'] = $imagePath;
        }

        try {
            Portfolio::query()->create($input);
            notify()->success("Portfolio created successfully.", "Success");
            return to_route('admin.portfolios.index');
        } catch (Exception $exception) {

            // If an image was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($input['image']) && Storage::disk('public')->exists($input['image'])) {
                Storage::disk('public')->delete($input['image']);
            }

            notify()->error("Failed to create portfolio", "Error");
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $services = Service::query()->latest()->get(['id', 'name']);
        return view('admin.portfolios.form', ['editModeData' => $portfolio, 'services' => $services]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio): RedirectResponse
    {
        $input = $request->validated();

        // Check if a new logo is being uploaded
        $image = $request->file('image');

        if ($image) {
            $imageName = md5(Str::random(10) . time()) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('portfolios', $imageName, 'public');
            $input['image'] = $imagePath;

            // Delete the old image if it exists
            if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                Storage::disk('public')->delete($portfolio->image);
            }
        }

        try {
            $portfolio->update($input);
            notify()->success("Portfolio updated successfully.", "Success");
            return to_route('admin.portfolios.index');
        } catch (Exception $exception) {

            // If an image was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($input['image']) && Storage::disk('public')->exists($input['image'])) {
                Storage::disk('public')->delete($input['image']);
            }

            notify()->error("Failed to update portfolio", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        try {
            // Delete the image from storage if it exists
            if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $portfolio->delete();

            return response()->json(['success' => true, 'statusCode' => 200, 'message' => 'Portfolio deleted successfully.']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'statusCode' => 500, 'message' => 'Failed to delete portfolio.']);
        }
    }
}
