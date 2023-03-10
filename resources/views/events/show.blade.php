@extends('layout')

@section('title', $event->title)

@section('content')
    <div class="bg-blue-100 shadow-inner">
        <div class="container px-12 py-6">
            <h1 class="text-6xl">{{ $event->title }}</h1>
            <p class="text-xl mt-2">
                {{ $event->timespan }}. Georganiseerd door {{ $event->owner->name }}.
            </p>
        </div>
    </div>

    <div class="bg-gray-50">
        <div class="container px-12 py-6">
            <div class="flex flex-col lg:flex-row">
                <main class="flex-auto text-xl mr-8 prose prose-lg mb-8">
                    {!! $event->description !!}
                </main>
                <aside class="w-96 shrink-0">
                    @livewire('registration-form', ['event' => $event])
                    @livewire('event-details', ['event' => $event])
                    @if ($event->registrations_public)
                        @livewire('registrations-list', ['event' => $event])
                    @endif
                </aside>
            </div>
        </div>
    </div>
@endsection
