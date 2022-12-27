<?php

namespace App\Http\Livewire;

use App\Models\Event;
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
}
