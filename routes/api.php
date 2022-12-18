<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('/events/{event}/registrations', RegistrationController::class)
    ->only(['store']);
