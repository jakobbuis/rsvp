<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EventsController extends Controller
{
    public function index(): View
    {
        $events = Auth::user()->events()->orderBy('start', 'desc')->get();

        return view('events.index', ['events' => $events]);
    }

    public function show(Event $event): View
    {
        return view('events.show', ['event' => $event]);
    }
}
