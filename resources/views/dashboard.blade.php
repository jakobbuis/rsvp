@extends('layout')

@section('title', 'Welkom')

@section('content')

    <div class="bg-gray-50">
        <div class="container px-12 py-6">
            <div class="flex flex-col lg:flex-row">
                <main class="flex-auto text-xl mr-8 mb-8">
                    <p class="mb-8">
                        Welcome op RSVP, een simpele manier om RSVPs te verzamelen voor jouw event. Gebruik de e-mail link om te starten.
                    </p>

                    @livewire('login')

                    <p class="my-8">
                        <h2 class="font-bold">Privacy</h2>
                        We geven je data aan niemand, tenzij dat wettelijk verplicht is.
                    </p>
                </main>
            </div>
        </div>
    </div>
@endsection
