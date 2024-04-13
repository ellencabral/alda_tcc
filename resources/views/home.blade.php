<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="mt-4" action="{{ route('search') }}" method="GET">
                        <x-text-input class="w-full" type="text" name="search" :value="old('search')" placeholder="Pesquisar produtos..." />
                        <x-secondary-button class="mt-4" type="submit">{{ __('Search') }}</x-secondary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
