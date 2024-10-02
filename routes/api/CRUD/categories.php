<?php

use App\Http\Controllers\Api\CategoryAPIController;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;

//crud operations for categories
Route::group(['middleware' => ['auth:sanctum', 'verified', EnsureAdmin::class]], function () {
    Route::get('/category', [CategoryAPIController::class, 'index']);
    Route::post('/category/create', [CategoryAPIController::class, 'store']);
    Route::get('/category/show/{category}', [CategoryAPIController::class, 'show']);
    Route::put('/category/edit/{category}', [CategoryAPIController::class, 'update']);
    Route::delete('/category/delete/{category}', [CategoryAPIController::class, 'destroy']);
});
