<?php

namespace App\Models;

use Dyrynda\Database\Support\BindsOnUuid;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    use GeneratesUuid;
    use BindsOnUuid;

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
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
}
