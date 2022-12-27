<div class="bg-blue-100 p-4 rounded-lg shadow-md mb-4">
    <h3 class="font-bold mb-2">Details</h3>

    <p class="mb-2">
        {{-- house --}}
        <svg class="float-left w-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
          </svg>

        @if ($event->address)
            <a class="underline" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($event->address) }}">
                {{ $event->address }}
            </a>
        @else
            Geen adres vermeld
        @endif
    </p>

    <p class="mb-2">
        {{-- person --}}
        <svg class="float-left w-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
          </svg>

        @if ($event->max_registrations)
            {{ $event->registrations()->count() }}/{{ $event->max_registrations}}
        @else
            {{ $event->registrations()->count() }}
        @endif
        aanmeldingen
    </p>

    <p class="mb-2">
        {{-- clock --}}
        <svg class="float-left w-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>

        @if ($event->registration_closes)
            Aanmelden tot {{ $event->registration_closes->isoFormat('DD-MM HH:mm') }}
        @else
            Geen deadline voor aanmelden
        @endif
    </p>
</div>
