<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

//CATEGORIES ROUTE
Route::resource('categories', CategoryController::class)
    ->middleware(['auth', 'verified']);
