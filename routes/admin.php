<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;


//Login
Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::put('change-password', [LoginController::class, 'changePassword'])->name('changePassword');
    Route::put('password/update', [LoginController::class, 'updatePassword'])->name('password.update');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
