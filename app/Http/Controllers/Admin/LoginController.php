<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        try {
            if (Auth::attempt($request->validated(), $request->boolean('remember'))) {
                if (! Auth::user()->status) {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();

                    return back()->withErrors(['email' => 'Your account has been deactivated. Please contact the administrator.']);
                }

                $request->session()->regenerate();

                return redirect()->intended(route('admin.dashboard'))->with('success', 'Login successful');
            }

            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        } catch (Exception $exception) {
            logger()->error('Login error: ' . $exception->getMessage());

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('success', 'You have been logged out successfully.');
    }
}
