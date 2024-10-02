<?php

use Illuminate\Support\Facades\Route;

//ONE TIME VIEW ROUTES
Route::view('/policy', 'policy')->name('policy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/stillnotconvinced', 'stillnotconvinced')->name('stillnotconvinced');
