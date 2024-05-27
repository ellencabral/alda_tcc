<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/ab1643a237.js" crossorigin="anonymous"></script>
    </head>
    <body class="h-screen font-sans antialiased">

        <!-- Page Header -->
        <header class="flex justify-between items-center p-6 bg-primary-700">
            <a class="font-extrabold text-xl" href="{{ route('alda') }}">Alda</a>

            {{ $navigation }}
        </header>

        <!-- Session Status -->
        @if(session('status') !== null)
            <x-auth-session-status class="m-4" :status="session('status')"/>
        @endif


        <!-- Page Content -->
        <main class="grid gap-16 mx-4 sm:mx-32 mt-8">
            <!-- Page Heading -->
            @isset($heading)
                <h1 class="font-extrabold text-4xl text-gray-800">{{ $heading }}</h1>
            @endisset
            {{ $slot }}
        </main>

        <!-- Page Footer -->
        <footer class="bg-secondary-300 p-16 flex justify-center items-center mt-32">
            2024 &#169; Alda
        </footer>
    </body>
</html>
