<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $searchKeyword = $request->input('search');
            $query = User::with('profile')
                ->when($searchKeyword, function ($q) use ($searchKeyword) {
                    $q->where(function ($q) use ($searchKeyword) {
                        $q->where('name', 'LIKE', "%$searchKeyword%")
                            ->orWhere('phone', 'LIKE', "%$searchKeyword%")
                            ->orWhere('email', 'LIKE', "%$searchKeyword%");
                    });
                })
                ->latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('profile_info', function ($row) {
                    $avatar = Storage::url($row?->profile?->picture);
                    $name = $row->name;
                    $email = $row->email;
                    $designation = $row?->profile?->designation ?? ''; // in case phone is null
                    $phone = $row?->profile?->phone ?? 'N/A'; // in case phone is null

                    return '
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-45px me-5">
                                <img alt="Pic" src="' . $avatar . '" />
                            </div>
                            <div class="d-flex justify-content-start flex-column">
                                <a href="javascript:void(0)" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">' . $name . '</a>
                                <a href="javascript:void(0)" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">' . $designation . '</a>
                                <a href="javascript:void(0)" class="text-muted text-hover-primary fw-bold d-block fs-7">
                                    <span class="text-dark">Email</span>: ' . $email . '
                                </a>
                                <a href="javascript:void(0)" class="text-muted text-hover-primary fw-bold d-block fs-7">
                                    <span class="text-dark">Phone</span>: ' . $phone . '
                                </a>
                            </div>
                        </div>';
                })
                ->addColumn('social_links', function ($row) {
                    $socials = '';
                    if (!empty($row->profile->facebook)) {
                        $socials .= '<a href="' . $row->profile->facebook . '" class="me-2" target="_blank"><i class="bi bi-facebook fs-5 text-primary"></i></a>';
                    }
                    if (!empty($row->profile->twitter)) {
                        $socials .= '<a href="' . $row->profile->twitter . '" class="me-2" target="_blank"><i class="bi bi-twitter-x fs-5 text-info"></i></a>';
                    }
                    if (!empty($row->profile->linkedin)) {
                        $socials .= '<a href="' . $row->profile->linkedin . '" class="me-2" target="_blank"><i class="bi bi-linkedin fs-5 text-primary"></i></a>';
                    }
                    if (!empty($row->profile->instagram)) {
                        $socials .= '<a href="' . $row->profile->instagram . '" class="me-2" target="_blank"><i class="bi bi-instagram fs-5 text-danger"></i></a>';
                    }

                    return '<div>' . $socials . '</div>';
                })
                ->addColumn('status', function ($row) {
                    return $row->status
                        ? '<div class="badge badge-light-success fw-bolder">Active</div>'
                        : '<div class="badge badge-light-danger fw-bolder">Inactive</div>';
                })
                ->addColumn('created_at', fn($row) => Carbon::parse($row->created_at)->diffForHumans())
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.users.edit', $row->id);
                    $viewUrl = route('admin.users.show', $row->id);

                    return view('admin.users.partials.actions', compact('editUrl', 'viewUrl'))->render();
                })
                ->rawColumns(['action', 'status', 'profile_info', 'social_links']) // Make sure picture is marked raw
                ->make(true);
        }

        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'password' => Hash::make('password'), // Change if needed
            ]);

            $profileData = $request->only([
                'designation',
                'phone',
                'gender',
                'address',
                'about_me',
                'facebook',
                'twitter',
                'linkedin',
                'instagram'
            ]);

            if ($request->dob) {
                $profileData['dob'] = date("Y-m-d", strtotime(str_replace('/', '-', $request->dob)));
            }

            if ($request->hasFile('picture')) {
                $profileData['picture'] = $request->file('picture')->store('profile_images', 'public');
            }

            $user->profile()->create($profileData);

            DB::commit();

            notify()->success("User created successfully.", "Success");
            return to_route('admin.users.index');
        } catch (Exception $exception) {

            dd($exception);
            DB::rollBack();
            // If an picture was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($profileData['picture']) && Storage::disk('public')->exists($profileData['picture'])) {
                Storage::disk('public')->delete($profileData['picture']);
            }

            notify()->error("Failed to create user", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.form', ['editModeData' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UserUpdateRequest $request, User $user)
    {
        try {
            DB::beginTransaction();

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
            ]);

            $profileData = $request->only([
                'designation',
                'phone',
                'gender',
                'address',
                'about_me',
                'facebook',
                'twitter',
                'linkedin',
                'instagram'
            ]);

            if ($request->dob) {
                $profileData['dob'] = date("Y-m-d", strtotime(str_replace('/', '-', $request->dob)));
            }

            if ($request->hasFile('picture')) {
                // delete old image
                if ($user->profile->picture) {
                    Storage::disk('public')->delete($user->profile->picture);
                }
                $profileData['picture'] = $request->file('picture')->store('profile_images', 'public');
            }

            $user->profile()->updateOrCreate(
                ['user_id' => $user->id],
                $profileData
            );

            DB::commit();

            notify()->success("User updated successfully.", "Success");
            return to_route('admin.users.index');
        } catch (Exception $exception) {
            DB::rollBack();
            // If an picture was uploaded, delete the newly uploaded file to prevent orphaned files
            if (isset($profileData['picture']) && Storage::disk('public')->exists($profileData['picture'])) {
                Storage::disk('public')->delete($profileData['picture']);
            }

            notify()->error("Failed to update user", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
