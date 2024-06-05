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
    <body class="flex flex-col h-screen font-sans antialiased">
        <!-- Page Header -->
        <header class="flex justify-between items-center p-6 bg-primary-700 mb-8">
            <div class="flex">
                @include('layouts.navigation.dropdown.app')

                <a class="font-extrabold text-xl"
                   href="@auth {{ route('home') }} @else {{ route('alda') }} @endauth">
                    Alda
                </a>
            </div>

            <div class="flex items-center">
                @auth
                    @role('admin')
                    <x-link-button class="h-8" :href="route('admin.index')">
                        Painel do Admin
                    </x-link-button>
                    @endrole

                    @role('artisan')
                    <x-link-button class="h-8" :href="route('artisan.shops.dashboard')">
                        Painel do Artesão
                    </x-link-button>
                    @endrole

                    @can('activate shop')
                        <x-link-button class="h-8" :href="route('shops.activate')">
                            Ativar Loja
                        </x-link-button>
                    @elsecan('create shop')
                        <x-link-button class="h-8" :href="route('shops.create')">
                            Criar Loja
                        </x-link-button>
                    @endcan
                @endauth

                @include('layouts.navigation.app')
            </div>
        </header>

        <!-- Search Bar -->
        @auth
            <search class="mx-4">
                <x-form-search/>
            </search>
        @endauth

        <!-- Breadcrumbs -->
        @isset($breadcrumbs)
            <nav class="mx-4">
                {{ $breadcrumbs }}
            </nav>
        @endisset

        <!-- Session Status -->
        @if(session('status') !== null)
            <div class="mx-4 mt-8 ">
                @if(session('status') == 'verification-link-sent')
                    <p class="p-4 rounded font-medium text-sm bg-green-400">
                        Um novo e-mail de verificação foi enviado para o e-mail que você inseriu.
                    </p>
                @elseif(session('status') === 'product-added')
                    <p class="p-4 rounded font-medium text-sm bg-green-400">
                        Produto adicionado na sua sacola de compras.
                    </p>
                @elseif(session('status') === 'product-not-added')
                    <p class="p-4 rounded font-medium text-sm bg-yellow-400">
                        Esvazie sua sacola de compras ou finalize a encomenda antes de comprar um produto desta loja.
                    </p>
                @elseif(session('status') === 'commission-stored')
                    <div class="p-4 rounded bg-yellow-400">
                        <h2 class="mb-2 font-bold">
                            Encomenda solicitada!
                        </h2>
                        <p class="text-sm font-medium">
                            Finalize o pagamento para que o artesão possa começar a produção.
                        </p>
                    </div>
                @elseif(session('status') === 'commission-destroyed')
                    <div class="p-4 rounded bg-green-400">
                        <p class="text-sm font-medium">
                            Encomenda cancelada com sucesso.
                        </p>
                    </div>
                @else
                    <x-auth-session-status :status="session('status')"/>
                @endif
            </div>
        @endif
        <!-- Page Content -->
        <main class="flex-grow mx-4">

            <!-- Page Heading -->
            @isset($heading)
                <h1 class="font-extrabold text-4xl text-gray-800 my-8">
                    {{ $heading }}
                </h1>
            @endisset

            {{ $slot }}
        </main>

        <!-- Page Footer -->
        <footer class="static bottom-0 bg-secondary-300 p-16 flex justify-center items-center mt-32">
            2024 &#169; Alda
        </footer>
    </body>
</html>
