<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;

class RegistrationForm extends Component
{
    public Event $event;
    public string $name;

    protected $rules = [
        'name' => ['required', 'string', 'min:1'],
    ];

    protected $messages = [
        'name.required' => 'Je moet een naam invullen',
        'name.string' => 'Je naam moet tekst zijn',
        'name.min' => 'Je naam moet tenminste één karakter bevatten',
    ];

    public function render()
    {
        return view('livewire.registration-form');
    }

    public function register()
    {
        $this->validate();

        if ($this->event->registration_closes && $this->event->registration_closes <= Carbon::now()) {
            session()->flash('deadline-passed', true);
        } else {
            $this->event->registrations()->create(['name' => $this->name]);
            session()->flash('registered', true);
        }
    }
}
