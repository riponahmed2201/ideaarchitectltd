<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $searchKeyword = $request->input('search');
            $query = Video::query()
                ->when($searchKeyword, function ($q) use ($searchKeyword) {
                    $q->where(function ($q) use ($searchKeyword) {
                        $q->where('title', 'LIKE', "%$searchKeyword%")
                            ->orWhere('description', 'LIKE', "%$searchKeyword%")
                            ->orWhere('url', 'LIKE', "%$searchKeyword%");
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
                    $editUrl = route('admin.videos.edit', $row->id);
                    $deleteUrl = route('admin.videos.destroy', $row->id);

                    return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '" data-url="' . $deleteUrl . '">Delete</button>
                    ';
                })
                ->rawColumns(['action', 'status']) // Make sure image is marked raw
                ->make(true);
        }

        return view('admin.videos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.videos.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $request): RedirectResponse
    {
        $input = $request->validated();

        try {
            Video::query()->create($input);
            notify()->success("Video created successfully.", "Success");
            return to_route('admin.videos.index');
        } catch (Exception $exception) {
            notify()->error("Failed to create video", "Error");
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('admin.videos.form', ['editModeData' => $video]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoRequest $request, Video $video): RedirectResponse
    {
        $input = $request->validated();

        try {
            $video->update($input);
            notify()->success("Video updated successfully.", "Success");
            return to_route('admin.videos.index');
        } catch (Exception $exception) {
            notify()->error("Failed to update video", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        try {
            $video->delete();
            return response()->json(['success' => true, 'statusCode' => 200, 'message' => 'Video deleted successfully.']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'statusCode' => 500, 'message' => 'Failed to delete videos.']);
        }
    }
}
