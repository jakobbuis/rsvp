<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('dashboard');
Route::get('login', [AuthenticationController::class, 'login'])->name('login');
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::resource('events', EventController::class)
    ->only(['show']);

Route::get('/about', PageController::class)->name('about');
