<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Event $event, Request $request)
    {
        $event->registrations()->create($request->only('name'));
        return response()->noContent();
    }
}
