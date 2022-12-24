@extends('layout')

@section('title', $event->title)

@section('content')
    <div class="bg-blue-100">
        <div class="container mx-auto px-12 py-6">
            <h1 class="text-4xl">{{ $event->title }}</h1>
            <p>{{ $event->timespan }}</p>
            <p>
                {!! $event->description !!}
            </p>
        </div>
    </div>
@endsection
