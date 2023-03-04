<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        if (Auth::check()) {
            return view('dashboard', ['events' => Auth::user()->events]);
        } else {
            return view('dashboard');
        }
    }
}
