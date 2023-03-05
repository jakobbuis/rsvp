@extends('layout')

@section('title', 'Nieuw event')

@section('content')
    <div class="bg-blue-100 shadow-inner">
        <div class="container px-12 py-6">
            <h1 class="text-6xl">Nieuw event</h1>
            <p class="text-xl mt-2">

            </p>
        </div>
    </div>

    <form action="{{ route('events.store') }}" method="POST" class="form">
        @csrf
        <div class="bg-gray-100">
            <div class="container px-12 py-6">
                <div class="flex flex-col lg:flex-row">
                    <main class="flex-auto text-xl mr-8 prose prose-lg mb-8">

                        @if ($errors->any())
                            <div class="bg-white border-l-8 border-red-500 py-2 bg-red-200">
                                <ul class="list-none m-0 p-0">
                                    @foreach ($errors->all() as $error)
                                        <li class="m-0 mb-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <p>
                            <label class="label" for="title">Titel</label>
                            <input class="input" type="text" id="title" name="title" value="{{ old('title') }}" required>
                        </p>
                        <div class="flex gap-4">
                            <div class="flex-1">
                                <label class="label" for="start">Start</label>
                                <input class="input" type="datetime-local" id="start" name="start" value="{{ old('start') }}" required>
                            </div>
                            <div class="flex-1">
                                <label class="label" for="end">Einde (optioneel)</label>
                                <input class="input" type="datetime-local" id="end" name="end" value="{{ old('end') }}">
                            </div>
                        </div>
                        <p>
                            <label class="label" for="description">Omschrijving</label>
                            <textarea class="input" id="description" name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                        </p>
                        <p>
                            <label class="label" for="address">Adres (optioneel)</label>
                            <input class="input" type="text" id="address" name="address" value="{{ old('address') }}">
                        </p>
                        <div class="flex gap-4">
                            <div class="flex-1">
                                <label class="label" for="max_registrations">Maximum gasten (optioneel)</label>
                                <input class="input" type="number" step="1" min="1" id="max_registrations" name="max_registrations" value="{{ old('max_registrations') }}">
                            </div>
                            <div class="flex-1">
                                <input type="hidden" name="registrations_public" value="0" />
                                <div class="flex">
                                    <input type="checkbox" name="registrations_public" value="1" class="mr-2" {{ old('registrations_public', true) ? 'checked' : null }} />
                                    <label class="label" for="end">Gastenlijst zichtbaar</label>
                                </div>
                            </div>
                        </div>
                        <p>
                            <button class="button" type="submit">Opslaan</button>
                        </p>
                    </main>
                </div>
            </div>
        </div>
    </form>
@endsection
