<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard')->name('dashboard');
Route::get('login', [AuthenticationController::class, 'login'])->name('login');
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('events', [EventsController::class, 'index'])->name('events.index');
});

Route::get('events/{event}', [EventsController::class, 'show'])->name('events.show');

Route::get('/about', PageController::class)->name('about');
