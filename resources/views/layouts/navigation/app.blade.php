<nav class="flex items-center hidden sm:flex sm:justify-between sm:ml-8">
    <!-- Navigation Links -->
    @auth
        <x-nav-link
            :href="route('home')"
            :active="request()->routeIs('home')">
            Início
        </x-nav-link>

        <x-nav-link class="ml-8"
                    :href="route('profile.edit')"
                    :active="request()->routeIs('profile.edit')">
            Minha Conta
        </x-nav-link>

        <x-nav-link class="ml-8"
                    :href="route('commissions.index')"
                    :active="request()->routeIs('commissions.index')">
            Minhas Encomendas
        </x-nav-link>

        <x-nav-link class="ml-8"
                    :href="route('cart')"
                    :active="request()->routeIs('cart')">
            Sacola de Compras
            @if(\Cart::content()->isNotEmpty())
                <span class="text-xs ml-2 font-extrabold shadow-md bg-secondary-300 h-4 w-4 flex items-center justify-center rounded-full">
                    {{ \Cart::content()->count() }}
                </span>
            @endif
        </x-nav-link>

        <!-- Authentication -->
        <form class="flex items-center ml-8" method="POST" action="{{ route('logout') }}">
            @csrf

            <x-nav-link class="h-full" :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-nav-link>
        </form>
    @else
        <x-nav-link
            :href="route('login')"
            :active="request()->routeIs('login')">
            Entrar
        </x-nav-link>

        <x-nav-link
            :href="route('register')"
            :active="request()->routeIs('register')">
            Cadastrar
        </x-nav-link>
    @endauth
</nav>
