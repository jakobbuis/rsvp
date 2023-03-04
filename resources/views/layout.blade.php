<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') -- RVSP</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-gray-50">
        <header>
            <div class="container">
                <div class="flex py-6 px-12 justify-between items-center">
                    <div class="flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <img src="/images/logo.png" alt="" class="align-baseline h-12">
                            <h1 class="text-4xl ml-2">RSVP</h1>
                        </a>
                    </div>
                    <menu class="align-end">
                        @auth
                            Logged in as {{ Auth::user()->email }}
                            |
                            <a class="text-blue-700 hover:underline" href="{{ route('dashboard' )}}">Mijn events</a>
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
