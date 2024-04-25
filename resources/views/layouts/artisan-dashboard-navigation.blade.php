<nav class="pt-4 px-4 pb-4 md:block w-auto md:pb-0 md:overflow-y-auto">
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
        <a href="/">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </a>
    </div>
    <button class="sm:hidden items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <div class="hidden sm:flex sm:flex-col">
        <x-dashboard-nav-link :href="route('artisan.shop.dashboard')">
            {{ __('Dashboard') }}
        </x-dashboard-nav-link>

        <x-dashboard-nav-link :href="route('artisan.products.index')">
            Produtos
        </x-dashboard-nav-link>

        <x-dashboard-nav-link :href="route('artisan.commissions.index')">
            Encomendas
        </x-dashboard-nav-link>

        <x-dashboard-nav-link :href="route('artisan.shop.edit')">
            Configurações
        </x-dashboard-nav-link>

        <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
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
    </div>
</nav>
