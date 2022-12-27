<div class="bg-blue-100 p-4 rounded-lg shadow-md mb-4">
    <h3 class="font-bold mb-2">Aanmeldingen</h3>

    <ul>
        @foreach ($event->registrations as $registration)
            <li>{{ $registration->name }}</li>
        @endforeach
    </ul>
</div>
