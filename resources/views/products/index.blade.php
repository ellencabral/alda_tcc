<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produtos da '{{ $shop_name }}'

        </h2>
    </x-slot>
    <div class="py-12">
    @foreach($products as $product)
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <li>
                        Nome: {{ $product->description }}
                    </li>
                    <li>
                        <a href="{{ route('products.show', $product->id) }}">Ver Detalhes</a>
                    </li>
                </div>
            </ul>
        </div>
    @endforeach
    </div>

</x-app-layout>
