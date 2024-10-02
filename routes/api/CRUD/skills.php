<?php

use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SkillAPIController;

//crud operations for skills
Route::group(['middleware' => ['auth:sanctum', 'verified', EnsureAdmin::class]], function () {
    Route::get('/skills', [SkillAPIController::class, 'index']);
    Route::post('/skills/create', [SkillAPIController::class, 'store']);
    Route::get('/skills/show/{skill}', [SkillAPIController::class, 'show']);
    Route::put('/skills/edit/{skill}', [SkillAPIController::class, 'update']);
    Route::delete('/skills/delete/{skill}', [SkillAPIController::class, 'destroy']);
});
