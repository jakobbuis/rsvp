<?php

namespace App\Http\Livewire;

use App\Mail\LoginLinkEmail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Login extends Component
{
    public string $email;

    protected $rules = [
        'email' => ['required', 'email'],
    ];

    protected $messages = [
        'email.required' => 'Je moet een e-mailadres invullen',
        'email.email' => 'Dit e-mailadres is niet correct',
    ];

    public function render()
    {
        return view('livewire.login');
    }

    public function send()
    {
        $this->validate();

        Mail::to($this->email)->send(new LoginLinkEmail($this->email));

        session()->flash('login_email_sent', true);
    }
}
