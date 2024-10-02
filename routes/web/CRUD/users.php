<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//USERS ROUTE
Route::resource('users', UserController::class)
    ->middleware(['auth', 'verified']);
