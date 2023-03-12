<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegistrationForm extends Component
{
    public Event $event;
    public string $name;

    public function __construct()
    {
        parent::__construct();

        if (Auth::check()) {
            $this->name = Auth::user()->name;
        }
    }

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

        if (!$this->event->openForRegistrations()) {
            session()->flash('deadline-passed', true);
        } else {
            Registration::create([
                'name' => $this->name,
                'event_id' => $this->event->id,
                'user_id' => Auth::user()->id ?? null,
            ]);

            $this->emit('registered', $this->name);
            session()->flash('registered', $this->name);
            $this->name = '';
        }
    }
}
