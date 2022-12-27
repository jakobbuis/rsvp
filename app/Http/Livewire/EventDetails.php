<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventDetails extends Component
{
    public Event $event;

    protected $listeners = [
        'registered',
    ];

    public function render()
    {
        return view('livewire.event-details');
    }

    public function registered(): void
    {
        $this->event = $this->event->fresh();
    }
}
