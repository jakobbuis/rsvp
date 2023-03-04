@extends('layout')

@section('title', 'Dashboard')

@section('content')

    <div class="bg-gray-50">
        <div class="container px-12 py-6">
            <div class="flex flex-col lg:flex-row">
                <main class="flex-auto text-xl mr-8 mb-8">
                    <p class="mb-8">
                        Welcome to RSVP, a simple tool to gather RSVPs for your event. Sign up using the link to create your event.
                    </p>

                    @livewire('login')

                    <p class="my-8">
                        <h2 class="font-bold">Privacy</h2>
                        We don't give your data to anyone else, unless required by law.
                    </p>
                </main>
            </div>
        </div>
    </div>
@endsection
