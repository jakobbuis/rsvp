@extends('layout')

@section('title', $event->title)

@section('content')
    <h1>{{ $event->title }}</h1>
    <div class="description">
        {!! $event->description !!}
    </div>
@endsection
