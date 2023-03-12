<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegistrationsList extends Component
{
    public Event $event;

    protected $listeners = [
        'registered',
    ];

    public function render()
    {
        return view('livewire.registrations-list');
    }

    public function registered(): void
    {
        $this->event->load('registrations');
    }

    public function remove(int $id): void
    {
        if (!Auth::check()) {
            abort(401, 'Je moet inloggen om deze functie te kunnen gebruiken');
        }

        $registration = Registration::findOrFail($id);
        if (!$registration->canBeDeletedBy(Auth::user())) {
            abort(403, 'Je mag deze aanmelding niet aanpassen');
        }

        $name = $registration->name;
        $registration->delete();
        $this->event->load('registrations');
        $this->emit('deregistered', $name);
    }
}
