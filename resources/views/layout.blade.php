<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') -- RVSP</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header>
            <div class="container">
                <div class="flex py-6 px-12 justify-between items-center">
                    <div class="flex items-center">
                        <img src="/images/logo.png" alt="" class="align-baseline h-12">
                        <h1 class="text-4xl ml-2">RSVP</h1>
                    </div>
                    <menu class="align-end">
                        <a href="#" id="sign-in">Sign in</a>
                    </menu>
                </div>
            </div>
        </header>

        <main>
           @yield('content')
        </main>
    </body>
</html>
