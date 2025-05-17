<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


//Home
Route::get('/', [HomeController::class, 'index']);

//Blog
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{id}', [BlogController::class, 'show']);
