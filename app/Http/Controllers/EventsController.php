<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function create(): View
    {
        return view('events.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'start' => ['required', 'date'],
            'end' => ['nullable', 'date'],
            'description' => ['string', 'nullable'],
            'address' => ['string', 'nullable'],
            'max_registrations' => ['integer', 'nullable', 'min:1', ''],
            'registrations_public' => ['required', 'boolean'],
        ]);

        $event = new Event($data);
        $event->user()->associate(Auth::user());
        $event->save();

        return redirect()->route('events.show', $event->uuid);
    }
}
