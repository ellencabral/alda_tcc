<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalhes do Produto '{{ $product->description }}'

        </h2>
    </x-slot>
    <div class="py-12">
            <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <ul class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <li>
                            Nome: {{ $product->description }}
                        </li>
                        <li>
                            Descrição: {{ $product->description }}
                        </li>
                        <li>
                            Preço: {{ $product->sale_price }}
                        </li>
                        <li>
                            @isset($product->stock)
                                Em estoque: {{ $product->stock }} unidades
                            @endisset

                            @isset($product->deadline)
                                Prazo de produção: {{ $product->deadline }} dias úteis
                            @endisset
                        </li>
                    </div>
                </ul>
            </div>
    </div>

</x-app-layout>
