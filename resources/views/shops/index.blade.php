<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lojas da Alda
        </h2>
    </x-slot>
    <div class="py-12 w-full">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">

            <livewire:live-search :results="$shops" :searchType="'Lojas'" />

        </div>
    </div>

</x-app-layout>
