<?php

namespace App\Models;

use Carbon\Carbon;
use Dyrynda\Database\Support\BindsOnUuid;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    use GeneratesUuid;
    use BindsOnUuid;

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
        'registration_closes' => 'datetime',
        'registrations_public' => 'boolean',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class)->orderBy('name', 'asc');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getTimespanAttribute(): string
    {
        $full = 'DD MMMM YYYY HH:mm';

        if (!$this->end) {
            return $this->start->isoFormat($full);
        }

        if ($this->start->isSameDay($this->end)) {
            return $this->start->isoFormat($full) . ' — ' . $this->end->isoFormat('HH:mm');
        }

        return $this->start->isoFormat($full) . ' — ' . $this->end->isoFormat($full);
    }

    public function openForRegistrations(): bool
    {
        if ($this->registration_closes === null && $this->max_registrations === null) {
            return true;
        }

        $isBeforeDeadline = (Carbon::now() < $this->registration_closes);
        $capacityLeft = $this->registrations->count() < $this->max_registrations;
        return $isBeforeDeadline && $capacityLeft;
    }
}
