<?php

use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\Frontend\ServiceController;
use Illuminate\Support\Facades\Route;


//Home
Route::get('/', [HomeController::class, 'index']);

//Privacy Policy
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy']);

//Blog
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/details/{id}', [BlogController::class, 'show']);

//Services
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/details/{id}', [ServiceController::class, 'show']);

//About Us
Route::get('/about-us', [AboutUsController::class, 'index']);

//Contact Us
Route::get('/contact-us', [ContactUsController::class, 'index']);

//Portfolio
Route::get('/portfolio', [PortfolioController::class, 'index']);

