<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class RegistrationsList extends Component
{
    public Event $event;

    public function render()
    {
        return view('livewire.registrations-list');
    }
}
