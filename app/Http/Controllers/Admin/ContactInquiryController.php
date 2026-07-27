<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\ContactInquiry;
use App\Models\Setting;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ContactInquiryController extends Controller
{
    public function index(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $searchKeyword = $request->input('search');
            $query = ContactInquiry::query()
                ->when($searchKeyword, function ($q) use ($searchKeyword) {
                    $q->where(function ($q) use ($searchKeyword) {
                        $q->where('name', 'LIKE', "%$searchKeyword%")
                            ->orWhere('email', 'LIKE', "%$searchKeyword%")
                            ->orWhere('phone', 'LIKE', "%$searchKeyword%")
                            ->orWhere('message', 'LIKE', "%$searchKeyword%");
                    });
                })
                ->latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('is_read', function ($row) {
                    return $row->is_read
                        ? '<div class="badge badge-light-success fw-bolder">Read</div>'
                        : '<div class="badge badge-light-warning fw-bolder">Unread</div>';
                })
                ->addColumn('created_at', fn ($row) => Carbon::parse($row->created_at)->diffForHumans())
                ->addColumn('action', function ($row) {
                    $showUrl = route('admin.contact-inquiries.show', $row->id);
                    $deleteUrl = route('admin.contact-inquiries.destroy', $row->id);

                    return '<a href="' . $showUrl . '" class="btn btn-sm btn-info">View</a>
                    <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '" data-url="' . $deleteUrl . '">Delete</button>';
                })
                ->rawColumns(['action', 'is_read'])
                ->make(true);
        }

        return view('admin.contact_inquiries.index');
    }

    public function show(ContactInquiry $contactInquiry): View
    {
        if (! $contactInquiry->is_read) {
            $contactInquiry->update(['is_read' => true]);
        }

        return view('admin.contact_inquiries.show', compact('contactInquiry'));
    }

    public function destroy(ContactInquiry $contactInquiry): JsonResponse
    {
        try {
            $contactInquiry->delete();

            return response()->json(['success' => true, 'statusCode' => 200, 'message' => 'Inquiry deleted successfully.']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'statusCode' => 500, 'message' => 'Failed to delete inquiry.']);
        }
    }
}
