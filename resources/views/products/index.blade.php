<x-artisan-layout>
    <div class="py-12 w-full">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Produtos da '{{ $shop_name }}'
            </h2>
            <x-secondary-button>
                <a href="{{ route('artisan.products.create') }}">Adicionar Produto</a>
            </x-secondary-button>
            @if(!$products->isEmpty())
                @foreach($products as $product)
                    <ul class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <li>
                                {{ $product->description }}
                            </li>
                            <li>
                                <x-nav-link href="{{ route('artisan.products.show', $product->id) }}">
                                    Ver Detalhes
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link href="{{ route('artisan.products.edit', $product->id) }}">
                                    Editar
                                </x-nav-link>
                            </li>

                        </div>
                    </ul>
                @endforeach
            @else
                <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Nenhum produto cadastrado ainda
                    </div>
                </div>
            @endif

        </div>
    </div>

</x-artisan-layout>
