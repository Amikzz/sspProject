<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//HOME PAGE
Route::get('/', HomeController::class)->name('home');


//AUTHENTICATION ROUTES
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//ONE TIME VIEW ROUTES
Route::view('/policy', 'policy')->name('policy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/stillnotconvinced', 'stillnotconvinced')->name('stillnotconvinced');
