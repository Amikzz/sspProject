<?php

use App\Http\Controllers\Api\SharerAPIController;
use Illuminate\Support\Facades\Route;

Route::get('/skillsharer', [SharerAPIController::class, 'index'])->middleware(['auth:sanctum']);
