@extends('layout')

@section('title', $event->title)

@section('content')
    <div class="bg-blue-100 shadow-inner">
        <div class="container px-12 py-6">
            <h1 class="text-6xl">{{ $event->title }}</h1>
            <p class="text-xl mt-2">
                {{ $event->timespan }}. Georganiseerd door {{ $event->user->name }}.
            </p>
        </div>
    </div>

    <div class="bg-gray-50">
    <div class="container px-12 py-6">
            <div class="flex">
                <main class="flex-auto text-xl mr-8 prose prose-lg">
                    {!! $event->description !!}
                </main>
                <aside class="w-72">
                    <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                        <h3 class="font-bold mb-2">RSVP</h3>
                        <form action="{{ route('registrations.store', $event->uuid) }}" method="POST" id="registrations-create">
                            @csrf
                            <p>
                                <input type="text" id="name" name="name" class="text-lg rounded-md p-2 mb-2 border-2 w-full" placeholder="Jouw naam">
                                <button type="submit" class="text-lg p-2 rounded-md border-1 border-blue-900 bg-blue-300 w-full inline-block">RSVP</button>
                            </p>
                        </form>

                        <div class="bg-white border-l-8 p-2 border-red-500 bg-red-100 mt-4 hidden" id="errors">
                            Je moet een naam opgeven.
                        </div>

                        <div class="bg-white border-l-8 p-2 border-green-500 bg-green-100 mt-4 hidden" id="success">
                            Aangemeld!
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
