<div class="bg-blue-100 p-4 rounded-lg shadow-md mb-4">
    <h3 class="font-bold mb-2">RSVP</h3>
    <form wire:submit.prevent="register">
        <p>
            <input type="text" wire:model="name" class="text-lg rounded-md p-2 mb-2 border-2 w-full" placeholder="Jouw naam">
            <button type="submit" class="text-lg p-2 rounded-md border-1 border-blue-900 bg-blue-300 w-full inline-block">RSVP</button>
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
