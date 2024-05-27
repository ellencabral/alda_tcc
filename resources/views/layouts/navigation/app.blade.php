<nav class="flex justify-end sm:w-full" x-data="{ open: false }">
    @role('admin')
        <x-nav-button :href="route('admin.index')">
            Painel do Admin
        </x-nav-button>
    @endrole

    @role('artisan')
        <x-nav-button :href="route('artisan.shops.dashboard')">
            Painel do Artesão
        </x-nav-button>
    @endrole

    @can('activate shop')
        <x-nav-button :href="route('shops.activate')">
            Ativar Loja
        </x-nav-button>
    @elsecan('create shop')
        <x-nav-button :href="route('shops.create')">
            Criar Loja
        </x-nav-button>
    @endcan

    <!-- Navigation Links -->
    <div class="hidden sm:flex sm:justify-between sm:ml-8">

        <x-nav-link
            :href="route('profile.edit')"
            :active="request()->routeIs('profile.edit')">
            Minha Conta
        </x-nav-link>

        <x-nav-link class="ml-8" :href="route('commissions.index')" :active="request()->routeIs('commissions.index')">
            Minhas Encomendas
        </x-nav-link>

        <x-nav-link class="ml-8" :href="route('cart')" :active="request()->routeIs('cart')">
            Sacola de Compras
            @if(\Cart::content()->isNotEmpty())
                <span class="font-bold bg-red-700 h-4 w-4 flex items-center justify-center rounded-full text-white">
                    {{ \Cart::content()->count() }}
                </span>
            @endif
        </x-nav-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-nav-link class="ml-8" :href="route('logout')"
                             onclick="event.preventDefault();
                                    this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-nav-link>
        </form>
    </div>

    <!-- Settings Dropdown -->
    <div class="sm:hidden ml-4">
        @auth
            <x-dropdown align="right">
                <x-slot name="trigger">
                    <!-- Hamburger -->
                    <button class="flex items-center rounded-md transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        Minha Conta
                    </x-dropdown-link>

                    <x-dropdown-link class="flex items-center" :href="route('cart')">
                        Sacola de Compras
                        @if(\Cart::content()->isNotEmpty())
                            <span class="font-bold bg-red-700 h-4 w-4 flex items-center justify-center rounded-full text-white">
                        {{ \Cart::content()->count() }}
                    </span>
                        @endif
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('commissions.index')">
                        Minhas Encomendas
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                    this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        @endauth
    </div>
</nav>
