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
        if (!$this->event->owner->is(Auth::user())) {
            abort(403);
        }

        $registration = Registration::findOrFail($id);
        $name = $registration->name;
        $registration->delete();
        $this->event->load('registrations');
        $this->emit('deregistered', $name);
    }
}
