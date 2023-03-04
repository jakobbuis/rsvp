<form wire:submit.prevent="send" class="bg-blue-100 p-8">
    @guest
        <label for="email" class="font-bold mb-2 block">Login met een e-mail link:</label>
        <input
            type="email"
            name="email"
            placeholder="yourname@example.com"
            wire:model="email"
            class="p-2 rounded-md w-96">
        <button type="submit" class="border bg-green-500 p-2 px-4 rounded-md hover:underline">Link versturen</button>
    @endguest

    @auth
        <p class="mb-4">Je bent ingelogd als {{ Auth::user()->email }}.</p>
        <p>
            <a class="text-blue-700 hover:underline" href="{{ route('events.index')}}">Mijn events</a>
            |
            <a class="text-blue-700 hover:underline" href="{{ route('logout') }}">Uitloggen</a>
        </p>
    @endauth

    @if ($errors->any())
        <div class="bg-white border-l-8 p-2 border-red-500 bg-red-100 mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('login_email_sent'))
        <div class="bg-white border-l-8 p-2 border-green-500 bg-green-100 mt-4">
            Link verzonden.
        </div>
    @endif
</form>
