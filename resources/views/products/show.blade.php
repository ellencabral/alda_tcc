<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('products.show', $product->shop, $product->description) }}
    </x-slot>
    <div class="py-12">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">

            <ul class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <li>
                        <img style="width:600px;" src="/img/products/{{ $product->image }}" alt="Imagem de {{ $product->description }}"/>
                    </li>
                    <li>
                        <h2 class="mb-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ $product->description }}
                        </h2>
                    </li>
                    <li class="whitespace-pre-line">
                        Descrição: {{ $product->observation }}
                    </li>
                    <li>
                        R$ {{ number_format($product->sale_price, 2, ',', '.') }}
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
                    <li>
                        Categoria: {{ $product->category->description }}
                    </li>

                    @auth
                        @if(Auth::user()->hasRole('artisan') && $product->shop_id == Auth::user()->shop->id)
                            <li>
                                <x-primary-button href="#">
                                    Editar
                                </x-primary-button>
                            </li>
                        @else
                            <li>
                                <x-form-shopping-bag :action="route('shopping-bag.add')"
                                                     :product="$product"
                                                     :quantity="true" />
                            </li>
                        @endif
                    @else
                        <li>
                            <x-form-shopping-bag :action="route('shopping-bag.add')"
                                                 :product="$product"
                                                 :quantity="true" />
                        </li>
                    @endauth

                </div>
            </ul>
        </div>
    </div>
</x-app-layout>
