<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillSharerController;

//SKILLSHARERS ROUTE
Route::resource('skillsharers', SkillSharerController::class)
    ->middleware(['auth', 'verified']);
