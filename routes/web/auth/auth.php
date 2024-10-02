<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChartController;

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
