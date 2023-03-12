@extends('layout')

@section('title', 'Mijn registrations')

@section('content')

    <div class="bg-gray-50">
        <div class="container px-12 py-6">
            <div class="flex flex-col lg:flex-row">
                <main class="flex-auto text-xl mr-8 mb-8">
                    <div>
                        <h1 class="font-bold text-4xl">Mijn aanmeldingen</h1>
                    </div>

                    <table class="table-auto mt-8 w-full">
                        <thead class="bg-gray-200"><tr>
                            <th class="p-2 text-left">Datum</th>
                            <th class="p-2 text-left">Event</th>
                            <th class="p-2 text-left">Aangemeld als</th>
                        </tr></thead>
                        <tbody>
                            @if ($registrations->count() == 0)
                                <tr>
                                    <td colspan="3" class="p-2 italic">Je hebt nog geen aanmeldingen</td>
                                </tr>
                            @endif
                            @foreach ($registrations as $registration)
                                <tr>
                                    <td class="p-2">{{ $registration->event->start->format('d-m-Y') }}</td>
                                    <td class="p-2">
                                        <a class="text-blue-700 hover:underline" href="{{ route('events.show', $registration->event->uuid)}}">
                                            {{ $registration->event->title }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $registration->name }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </div>
@endsection
