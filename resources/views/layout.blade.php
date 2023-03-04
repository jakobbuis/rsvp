<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') &ndash; RVSP</title>

        @vite(['resources/css/app.css'])
        @livewireStyles
    </head>
    <body class="bg-gray-50">
        <header>
            <div class="container">
                <div class="flex py-6 px-12 justify-between items-center">
                    <a class="flex items-center" href="{{ route('dashboard') }}">
                        <img src="/images/logo.png" alt="" class="align-baseline h-12">
                        <h1 class="text-4xl ml-2">RSVP</h1>
                    </a>
                    <menu class="align-end">
                        @auth
                           Ingelogd als  {{ Auth::user()->email }}
                            |
                            <a class="text-blue-700 hover:underline" href="{{ route('events.index' )}}">Mijn events</a>
                            |
                            <a class="text-blue-700 hover:underline" href="{{ route('logout' )}}">Log out</a>
                        @endauth

                        @guest
                            <a class="text-blue-700 hover:underline" href="{{ route('dashboard')}}">Login</a>
                        @endguest
                    </menu>
                </div>
            </div>
        </header>

        <main>
           @yield('content')
        </main>

        @livewireScripts
    </body>
</html>
