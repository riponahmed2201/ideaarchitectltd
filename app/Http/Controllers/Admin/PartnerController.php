<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
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

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $searchKeyword = $request->input('search');
            $query = Partner::query()
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
                ->addColumn('logo', function ($row) {
                    if ($row->logo) {
                        $url = Storage::url($row->logo);
                        return '<img src="' . $url . '" alt="Parner Image" width="60" height="60">';
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
                    $editUrl = route('admin.partners.edit', $row->id);
                    $deleteUrl = route('admin.partners.destroy', $row->id);

                    return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '" data-url="' . $deleteUrl . '">Delete</button>
                    ';
                })
                ->rawColumns(['action', 'status', 'logo'])
                ->make(true);
        }

        return view('admin.partners.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request): RedirectResponse
    {
        $input = $request->validated();

        $logo = $request->file('logo');

        if ($logo) {
            $logoName = md5(Str::random(10) . time()) . '.' . $logo->getClientOriginalExtension();
            $logoPath = $logo->storeAs('partners', $logoName, 'public');
            $input['logo'] = $logoPath;
        }
        try {
            Partner::query()->create($input);
            notify()->success("Partner created successfully.", "Success");
            return to_route('admin.partners.index');
        } catch (Exception $exception) {

            // If a logo was uploaded, delete the file to prevent orphaned files
            if (isset($input['logo']) && Storage::disk('public')->exists($input['logo'])) {
                Storage::disk('public')->delete($input['logo']);
            }

            notify()->error("Failed to create partner", "Error");
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.form', ['editModeData' => $partner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerRequest $request, Partner $partner): RedirectResponse
    {
        $input = $request->validated();

        // Check if a new logo is being uploaded
        $logo = $request->file('logo');

        if ($logo) {
            $logoName = md5(Str::random(10) . time()) . '.' . $logo->getClientOriginalExtension();
            $logoPath = $logo->storeAs('partners', $logoName, 'public');
            $input['logo'] = $logoPath;

            // Delete the old logo if it exists
            if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
                Storage::disk('public')->delete($partner->logo);
            }
        }

        try {
            $partner->update($input);
            notify()->success("Partner updated successfully.", "Success");
            return to_route('admin.partners.index');
        } catch (Exception $exception) {

            // If an logo was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($input['logo']) && Storage::disk('public')->exists($input['logo'])) {
                Storage::disk('public')->delete($input['logo']);
            }

            notify()->error("Failed to update partner", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        try {
            // Delete the image from storage if it exists
            if ($partner->image && Storage::disk('public')->exists($partner->image)) {
                Storage::disk('public')->delete($partner->image);
            }

            $partner->delete();

            return response()->json(['success' => true, 'statusCode' => 200, 'message' => 'Partner deleted successfully.']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'statusCode' => 500, 'message' => 'Failed to delete partner.']);
        }
    }
}
