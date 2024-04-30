<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('categories.products.index', $category) }}
    </x-slot>
    <div class="py-12 w-full">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">

            <livewire:live-search :results="$products" :searchType="'Produtos'" :category="$category" />

        </div>
    </div>
</x-app-layout>
