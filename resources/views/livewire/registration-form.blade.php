<div class="bg-blue-100 p-4 rounded-lg shadow-md mb-4">
    <h3 class="font-bold mb-2">
        RSVP
        @if (!$event->openForRegistrations())
            <span class="text-red-600">
                {{-- icon exclamation --}}
                <svg class="w-6 inline-block ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                Deadline verstreken
            </span>
        @endif
    </h3>
    <form wire:submit.prevent="register">
        <p>
            <input
                type="text"
                wire:model="name"
                placeholder="Jouw naam"
                class="text-lg rounded-md p-2 mb-2 border-2 w-full"
                {{ !$event->openForRegistrations() ? 'disabled' : null }}>

                <button
                    type="submit"
                    {{ !$event->openForRegistrations() ? 'disabled' : null }}
                    class="text-lg p-2 rounded-md border-1 border-blue-900 bg-blue-300 w-full inline-block">
                        RSVP
                </button>
        </p>
    </form>

    @if ($errors->any())
        <div class="bg-white border-l-8 p-2 border-red-500 bg-red-100 mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('registered'))
        <div class="bg-white border-l-8 p-2 border-green-500 bg-green-100 mt-4">
            Aangemeld!
        </div>
    @endif

    @if (session()->has('deadline-passed'))
        <div class="bg-white border-l-8 p-2 border-red-500 bg-red-100 mt-4">
            Je kunt je niet meer aanmelden.
        </div>
    @endif
</div>
