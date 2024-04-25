<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark-mode:bg-gray-900">
<div class="flex text-gray-700 bg-white md:w-64 dark:text-gray-200 dark:bg-gray-800">

    <x-dashboard-navigation>
        <x-dashboard-nav-link :href="route('artisan.shop.index')">
            {{ __('Dashboard') }}
        </x-dashboard-nav-link>

        <x-dashboard-nav-link :href="route('artisan.products.index')">
            Produtos
        </x-dashboard-nav-link>

        <x-dashboard-nav-link :href="route('artisan.shop.commissions.index')">
            Encomendas
        </x-dashboard-nav-link>

        <x-dashboard-nav-link :href="route('artisan.shop.edit')">
            Configurações
        </x-dashboard-nav-link>

        <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <span>{{ Auth::user()->name }}</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-700">
                    <x-dashboard-nav-link :href="route('home')">
                        {{ __('Home') }}
                    </x-dashboard-nav-link>
                    <x-dashboard-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dashboard-nav-link>
                    <x-dashboard-nav-link :href="route('shop.show', Auth::user()->shop->url)">
                        Minha Loja
                    </x-dashboard-nav-link>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dashboard-nav-link
                            :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dashboard-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </x-dashboard-navigation>
    <div class="flex flex-col w-full">
        <!-- Page Heading -->
        @if (isset($header))
            <header class="w-full bg-white dark:bg-gray-800 shadow">
                <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <div class="w-full min-h-screen bg-gray-100 dark:bg-gray-900">
            {{ $slot }}
        </div>
    </div>
</div>
</body>
</html>
