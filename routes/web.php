<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SkillSharerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//HOME PAGE
Route::get('/', HomeController::class)->name('home');

//SKILLS ROUTE
Route::resource('skills', SkillController::class)
    ->middleware(['auth', 'verified']);

//CATEGORIES ROUTE
Route::resource('categories', CategoryController::class)
    ->middleware(['auth', 'verified']);

//SKILLSHARERS ROUTE
Route::resource('skillsharers', SkillSharerController::class)
    ->middleware(['auth', 'verified']);

//USERS ROUTE
Route::resource('users', UserController::class)
    ->middleware(['auth', 'verified']);

//ORDERS ROUTE
Route::resource('orders', OrdersController::class)
    ->middleware(['auth', 'verified']);

//AUTHENTICATION ROUTES
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user-growth-data', [ChartController::class, 'getUserGrowthData'])->name('user-growth-data');
    Route::get('/skill-growth-data', [ChartController::class, 'getSkillGrowthData'])->name('skill-growth-data');
});

//ONE TIME VIEW ROUTES
Route::view('/policy', 'policy')->name('policy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/stillnotconvinced', 'stillnotconvinced')->name('stillnotconvinced');
