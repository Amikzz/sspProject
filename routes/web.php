<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

require_once __DIR__ . '/web/extraRoutes/extra.php';
require_once __DIR__ . '/web/CRUD/skills.php';
require_once __DIR__ . '/web/CRUD/categories.php';
require_once __DIR__ . '/web/CRUD/skillsharers.php';
require_once __DIR__ . '/web/CRUD/users.php';
require_once __DIR__ . '/web/CRUD/orders.php';
require_once __DIR__ . '/web/auth/auth.php';

//HOME PAGE
Route::get('/', HomeController::class)->name('home');
