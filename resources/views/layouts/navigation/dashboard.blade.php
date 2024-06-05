<nav class="flex items-center hidden sm:flex sm:justify-between sm:ml-8">
    <!-- Navigation Links -->

    <x-nav-link
        :href="route('home')"
        :active="request()->routeIs('home')">
        Início
    </x-nav-link>

    @role('artisan')
        <x-nav-link class="ml-8"
                    :href="route('profile.edit')"
                    :active="request()->routeIs('profile.edit')">
            Minha Loja
        </x-nav-link>

        <x-nav-link class="ml-8"
                    :href="route('commissions.index')"
                    :active="request()->routeIs('commissions.index')">
            Produtos
        </x-nav-link>

        <x-nav-link class="ml-8"
                    :href="route('cart')"
                    :active="request()->routeIs('cart')">
            Encomendas
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
    @else <!-- Admin Links -->
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
    @endrole
</nav>
