<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegistrationsController extends Controller
{
    public function index(): View
    {
        $registrations = Auth::user()->registrations()
                            ->leftJoin('events', 'registrations.event_id', '=', 'events.id')
                            ->with('event')
                            ->orderBy('events.start', 'desc')
                            ->orderBy('events.id', 'asc')
                            ->get();

        return view('registrations.index', ['registrations' => $registrations]);
    }
}
