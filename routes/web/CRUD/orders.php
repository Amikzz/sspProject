<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;

//ORDERS ROUTE
Route::resource('orders', OrdersController::class)
    ->middleware(['auth', 'verified']);
