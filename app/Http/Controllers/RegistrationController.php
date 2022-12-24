<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Event $event, Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'min:1'],
        ]);

        $event->registrations()->create($request->only('name'));

        return response()->noContent();
    }
}
