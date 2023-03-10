@extends('layout')

@section('title', 'Mijn events')

@section('content')

    <div class="bg-gray-50">
        <div class="container px-12 py-6">
            <div class="flex flex-col lg:flex-row">
                <main class="flex-auto text-xl mr-8 mb-8">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-4xl">Mijn events</h1>
                        <a href="{{ route('events.create') }}"
                            class="button">Nieuw event</a>
                    </div>

                    <table class="table-auto mt-8 w-full">
                        <thead class="bg-gray-200"><tr>
                            <th class="p-2 text-left">Datum</th>
                            <th class="p-2 text-left">Naam</th>
                            <th class="p-2 text-center">Aanmeldingen</th>
                        </tr></thead>
                        <tbody>
                            @if ($events->count() == 0)
                                <tr>
                                    <td colspan="3" class="p-2 italic">Je hebt nog geen events</td>
                                </tr>
                            @endif
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
                </main>
            </div>
        </div>
    </div>
@endsection
