@extends('layout')

@section('title', $event->title)

@section('content')
    <div class="bg-blue-100">
        <div class="container mx-auto px-12 py-6">
            <h1 class="text-4xl">{{ $event->title }}</h1>
            <p class="text-xl">{{ $event->timespan }}</p>
            <p>
                {!! $event->description !!}
            </p>

            <form action="{{ route('registrations.store', $event->uuid) }}" method="POST" id="registrations-create">
                @csrf
                <p>
                    <label for="name">Je naam:</label> <br>
                    <input type="text" id="name" name="name" class="h-8 rounded-md drop-shadow">
                    <button type="submit" class="p-1 ml-2 rounded-md border-1 border-gray-900 bg-green-300 drop-shadow">RSVP</button>
                </p>
            </form>

            <div class="bg-white border-l-8 p-2 border-red-500 bg-red-100 mb-4 hidden" id="errors">
                Je moet een naam opgeven.
            </div>

            <div class="bg-white border-l-8 p-2 border-green-500 bg-green-100 mb-4 hidden" id="success">
                Aangemeld!
            </div>
        </div>
    </div>
@endsection
