<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;

//SKILLS ROUTE
Route::resource('skills', SkillController::class)
    ->middleware(['auth', 'verified']);
