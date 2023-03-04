@extends('layout')

@section('title', 'Dashboard')

@section('content')

    <div class="bg-gray-50">
        <div class="container px-12 py-6">
            <div class="flex flex-col lg:flex-row">
                <main class="flex-auto text-xl mr-8 mb-8">

                    @guest
                        <p class="mb-8">
                            Welcome to RSVP, a simple tool to gather RSVPs for your event. Sign up using the link to create your event.
                        </p>

                        @livewire('login')

                        <p class="my-8">
                            <h2 class="font-bold">Privacy</h2>
                            We don't give your data to anyone else, unless required by law.
                        </p>

                    @endguest

                    @auth
                        <h1 class="font-bold text-4xl">Mijn events</h1>
                        <table class="table-auto mt-8 w-full">
                            <thead class="bg-gray-200"><tr>
                                <th class="p-2 text-left">Datum</th>
                                <th class="p-2 text-left">Naam</th>
                                <th class="p-2 text-center">Aanmeldingen</th>
                            </tr></thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td class="p-2">{{ $event->start->format('d-m-Y') }}</td>
                                        <td class="p-2">
                                            <a class="text-blue-700 hover:underline" href="{{ route('events.show', $event->uuid)}}">
                                                {{ $event->title }}
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            {{ $event->registrations()->count() }}
                                            @if ($event->max_registrations)
                                                / {{ $event->max_registrations }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endauth

                </main>
            </div>
        </div>
    </div>
@endsection
