<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VerifyEmailController;
use Illuminate\Support\Facades\Route;

//profile
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/email/verification-notification', [VerifyEmailController::class, 'sendVerificationEmail']);
    Route::post('/profile/edit-profile', [AuthController::class, 'editProfile']);
});
