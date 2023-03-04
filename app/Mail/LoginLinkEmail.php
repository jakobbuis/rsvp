<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\URL;

class LoginLinkEmail extends Mailable
{
    public string $link;
    public Carbon $validUntil;

    public function __construct(public string $email)
    {
        $this->validUntil = now()->addMinutes(15);

        $this->link = URL::temporarySignedRoute(
            'login',
            $this->validUntil,
            ['email' => $this->email]
        );
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'RSVP login link',
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'emails.login-link',
        );
    }
}
