<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideosController;
use Illuminate\Support\Facades\Route;


//Login
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware('admin')->group(function () {

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::put('change-password', [LoginController::class, 'changePassword'])->name('changePassword');
    Route::put('password/update', [LoginController::class, 'updatePassword'])->name('password.update');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    //Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('service-categories', ServiceCategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('tags', TagController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('videos', VideosController::class);

//User
    Route::resource('users', UserController::class);
});
