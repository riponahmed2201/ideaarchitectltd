<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    public function index(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $searchKeyword = $request->input('search');
            $query = Client::query()
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

                        return '<img src="' . $url . '" alt="Client Logo" width="60" height="60">';
                    }

                    return '<span class="badge badge-light">No Image</span>';
                })
                ->addColumn('status', function ($row) {
                    return $row->status
                        ? '<div class="badge badge-light-success fw-bolder">Active</div>'
                        : '<div class="badge badge-light-danger fw-bolder">Inactive</div>';
                })
                ->addColumn('created_at', fn ($row) => Carbon::parse($row->created_at)->diffForHumans())
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.clients.edit', $row->id);
                    $deleteUrl = route('admin.clients.destroy', $row->id);

                    return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '" data-url="' . $deleteUrl . '">Delete</button>';
                })
                ->rawColumns(['action', 'status', 'logo'])
                ->make(true);
        }

        return view('admin.clients.index');
    }

    public function create(): View
    {
        return view('admin.clients.form');
    }

    public function store(ClientRequest $request): RedirectResponse
    {
        $input = $request->validated();

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = md5(Str::random(10) . time()) . '.' . $logo->getClientOriginalExtension();
            $input['logo'] = $logo->storeAs('clients', $logoName, 'public');
        }

        try {
            Client::query()->create($input);
            notify()->success('Client logo added successfully.', 'Success');

            return to_route('admin.clients.index');
        } catch (Exception $exception) {
            if (isset($input['logo']) && Storage::disk('public')->exists($input['logo'])) {
                Storage::disk('public')->delete($input['logo']);
            }

            notify()->error('Failed to add client logo', 'Error');

            return back();
        }
    }

    public function edit(Client $client): View
    {
        return view('admin.clients.form', ['editModeData' => $client]);
    }

    public function update(ClientRequest $request, Client $client): RedirectResponse
    {
        $input = $request->validated();

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = md5(Str::random(10) . time()) . '.' . $logo->getClientOriginalExtension();
            $input['logo'] = $logo->storeAs('clients', $logoName, 'public');

            if ($client->logo && Storage::disk('public')->exists($client->logo)) {
                Storage::disk('public')->delete($client->logo);
            }
        }

        try {
            $client->update($input);
            notify()->success('Client logo updated successfully.', 'Success');

            return to_route('admin.clients.index');
        } catch (Exception $exception) {
            if (isset($input['logo']) && Storage::disk('public')->exists($input['logo'])) {
                Storage::disk('public')->delete($input['logo']);
            }

            notify()->error('Failed to update client logo', 'Error');

            return back();
        }
    }

    public function destroy(Client $client)
    {
        try {
            if ($client->logo && Storage::disk('public')->exists($client->logo)) {
                Storage::disk('public')->delete($client->logo);
            }

            $client->delete();

            return response()->json(['success' => true, 'statusCode' => 200, 'message' => 'Client logo deleted successfully.']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'statusCode' => 500, 'message' => 'Failed to delete client logo.']);
        }
    }
}
