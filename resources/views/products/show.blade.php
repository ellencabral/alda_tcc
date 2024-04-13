<x-app-layout>
    <div class="py-12">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Detalhes do Produto '{{ $product->description }}' da Loja {{ $shop->name }}
            </h2>
            <ul class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <li>
                        <img style="width:600px;" src="/img/products/{{ $product->image }}" alt="Imagem de {{ $product->description }}"/>
                    </li>
                    <li>
                        Título: {{ $product->description }}
                    </li>
                    <li class="whitespace-pre-line">
                        Descrição: {{ $product->observation }}
                    </li>
                    <li>
                        Preço: {{ $product->sale_price }}
                    </li>
                    @isset($product->stock)
                        <li>
                            Em estoque: {{ $product->stock }} unidades
                        </li>
                    @endisset
                    @isset($product->deadline)
                        <li>
                            Prazo de produção: {{ $product->deadline }} dias úteis
                        </li>
                    @endisset
                    @if(Auth::user()->hasRole('artisan') && $product->shop_id === Auth::user()->shop->id)
                        <li>
                            <x-nav-link href="{{ route('artisan.products.edit', $product->id) }}">
                                Editar
                            </x-nav-link>
                        </li>
                    @else
                        <li>
                            <x-nav-link href="#">
                                Comprar
                            </x-nav-link>
                        </li>
                    @endif
                </div>
            </ul>
        </div>
    </div>
</x-app-layout>
