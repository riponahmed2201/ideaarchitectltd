<?php

use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy']);
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/video-gallery', [HomeController::class, 'videoGallery'])->name('video-gallery');

Route::get('/services/{slug?}', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/details/{category_slug}/{service_slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/about-us', [AboutUsController::class, 'index']);

Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact.index');
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact.store');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
