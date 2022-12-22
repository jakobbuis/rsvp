<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::resource('events', EventController::class)
    ->only(['show']);

Route::get('/about', PageController::class)->name('about');
