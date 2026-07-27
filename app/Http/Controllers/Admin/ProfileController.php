<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::with('profile')->where('id', Auth::id())->first();

        return view('admin.profiles.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['required', 'string', 'max:20', Rule::unique('profiles', 'phone')->ignore($user->profile?->id)],
        ]);

        try {
            $user->update($request->only(['name', 'email']));

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
                $user->save();
            }

            $user->profile()->updateOrCreate(
                ['user_id' => $user->id],
                ['phone' => $request->phone, 'designation' => $user->profile?->designation ?? 'Admin']
            );

            notify()->success('Profile updated successfully.', 'Success');

            return back();
        } catch (Exception $exception) {
            Log::error('Profile update failed', ['error' => $exception->getMessage()]);
            notify()->error('Something went wrong! Please try again.', 'Error');

            return back();
        }
    }
}
