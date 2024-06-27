<nav class="z-50 sm:hidden flex items-center sm:w-full mr-4" x-data="{ open: false }">
    <!-- Settings Dropdown -->
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
                <p class="py-2 px-6">
                    Oi, {{ Auth::user()->name }}
                </p>
                <x-dropdown-link :href="route('home')">
                    <i class="fa-solid fa-house mr-2"></i> Início
                </x-dropdown-link>

                <x-dropdown-link :href="route('profile.edit')">
                    <i class="fa-solid fa-user mr-2"></i> Minha Conta
                </x-dropdown-link>

                <x-dropdown-link class="flex items-center" :href="route('cart')">
                    <i class="fa-solid fa-bag-shopping mr-3"></i> Sacola de Compras
                    @if(\Cart::content()->isNotEmpty())
                        <span class="font-bold bg-red-700 h-4 w-4 flex items-center justify-center rounded-full text-white">
                                {{ \Cart::content()->count() }}
                            </span>
                    @endif
                </x-dropdown-link>

                <x-dropdown-link :href="route('commissions.index')">
                    <i class="fa-solid fa-box-open mr-1"></i> Minhas Encomendas
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        <i class="fa-solid fa-right-from-bracket mr-1"></i> {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
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
                <x-dropdown-link :href="route('alda')">
                    Início
                </x-dropdown-link>

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
