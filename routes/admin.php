<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactInquiryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\PasswordChangeController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\QuoteRequestController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideosController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1')->name('login');

Route::middleware('admin')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('password-change', [PasswordChangeController::class, 'passwordChange'])->name('passwordChange');
    Route::put('password/update', [PasswordChangeController::class, 'updatePassword'])->name('password.update');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('service-categories', ServiceCategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('tags', TagController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('clients', ClientController::class);
    Route::redirect('partners', 'clients');
    Route::redirect('partners/{any}', 'clients')->where('any', '.*');
    Route::resource('sliders', SliderController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('videos', VideosController::class);
    Route::resource('faqs', FaqController::class)->except(['show']);
    Route::resource('testimonials', TestimonialController::class)->except(['show']);

    Route::resource('contact-inquiries', ContactInquiryController::class)->only(['index', 'show', 'destroy']);
    Route::resource('quote-requests', QuoteRequestController::class)->only(['index', 'show', 'destroy']);
    Route::resource('newsletter-subscribers', NewsletterSubscriberController::class)->only(['index', 'destroy']);

    Route::middleware('admin.role')->group(function () {
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
        Route::resource('users', UserController::class);
    });
});
