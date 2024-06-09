<?php

use App\Http\Controllers\Api\SkillAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

//OLD CODE
//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

//register
Route::post('/register', [AuthController::class, 'register']);

//login
Route::post('/login', [AuthController::class, 'login']);

//profile
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

//crud operations for skills
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/skills', [SkillAPIController::class, 'index']);
    Route::post('/skills/create', [SkillAPIController::class, 'store']);
    Route::get('/skills/show/{skill}', [SkillAPIController::class, 'show']);
    Route::put('/skills/edit/{skill}', [SkillAPIController::class, 'update']);
    Route::delete('/skills/delete/{skill}', [SkillAPIController::class, 'destroy']);
});
