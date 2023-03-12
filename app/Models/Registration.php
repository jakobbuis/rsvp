<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{
    use HasFactory;

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function canBeDeletedBy(User $user): bool
    {
        // Registrations can be removed by the user who created them up to the deadline
        // and by the event owner, before and after the deadline
        return ($this->user && $this->user->is($user) && $this->event->openForRegistrations())
            || $this->event->owner->is($user);
    }
}
