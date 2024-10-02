<?php

use App\Http\Controllers\Api\OrderAPIController;
use Illuminate\Support\Facades\Route;

//crud operations for orders
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/orders', [OrderAPIController::class, 'index']);
    Route::post('/orders/create', [OrderAPIController::class, 'store']);
    Route::get('/orders/show/{order}', [OrderAPIController::class, 'show']);
    Route::put('/orders/edit/{order}', [OrderAPIController::class, 'update']);
    Route::delete('/orders/delete/{order}', [OrderAPIController::class, 'destroy']);
});
