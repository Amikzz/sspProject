<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

//HOME PAGE
Route::get('/', HomeController::class)->name('home');

//SKILLS ROUTE
Route::resource('skills', SkillController::class)
    ->middleware(['auth', 'verified']);

//CATEGORIES ROUTE
Route::resource('categories', CategoryController::class)
    ->middleware(['auth', 'verified']);

//AUTHENTICATION ROUTES
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // routes/web.php
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//ONE TIME VIEW ROUTES
Route::view('/policy', 'policy')->name('policy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/stillnotconvinced', 'stillnotconvinced')->name('stillnotconvinced');
