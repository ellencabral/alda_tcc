<nav x-data="{ open: false }" >
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
