<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __invoke()
    {
        return view('pages.'.Route::currentRouteName());
    }
}
