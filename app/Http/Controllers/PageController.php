<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.'.Route::currentRouteName());
    }
}
