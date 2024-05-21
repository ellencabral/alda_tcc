<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/ab1643a237.js" crossorigin="anonymous"></script>
    </head>
    <body class="h-screen font-sans antialiased">

        <!-- Page Header -->
        <header class="flex justify-between items-center p-6 bg-primary-700">
            <a class="font-extrabold text-xl" href="{{ route('alda') }}">Alda</a>
            <nav class="flex justify-end items-center">
                @auth
                    <div>
                        <a href="{{ url('/home') }}">
                            Início
                        </a>
                    </div>
                @else
                    <x-dropdown align="right">
                        <x-slot name="trigger">
                            <!-- Hamburger -->
                            <div class="flex items-center">
                                <button class="inline-flex rounded-md transition duration-150 ease-in-out">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('login')">
                                Entrar
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('register')">
                                Cadastrar
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </nav>
        </header>

        <!-- Session Status -->
        @if(session('status') !== null)
            <x-auth-session-status class="m-4" :status="session('status')" />
        @endif


        <!-- Page Content -->
        <main class="grid gap-16 mx-4 mt-8">
            <!-- Page Heading -->
            @isset($heading)
                <h1 class="font-extrabold text-4xl text-gray-800">{{ $heading }}</h1>
            @endisset
            {{ $content }}
        </main>

        <!-- Page Footer -->
        <footer class="bg-secondary-300 p-16 flex justify-center items-center mt-32">
            2024 &#169; Alda
        </footer>
    </body>
</html>
