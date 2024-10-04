<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

//register
Route::post('/register', [AuthController::class, 'register']);

//login
Route::post('/login', [AuthController::class, 'login']);

require_once __DIR__ . '/api/profile/profile.php';
require_once __DIR__ . '/api/CRUD/skills.php';
require_once __DIR__ . '/api/CRUD/categories.php';
require_once __DIR__ . '/api/CRUD/orders.php';
require_once __DIR__ . '/api/CRUD/skillsharer.php';
