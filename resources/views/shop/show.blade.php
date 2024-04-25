<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Breadcrumbs::render('shop.show', $shop) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $shop->name }}
            </h2>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <p>
                    Criada em: {{ date('d/m/Y', strtotime($shop->created_at)) }}
                </p>
                @isset($shop->description)
                    <p class="whitespace-pre-line">
                        Descrição: {{ $shop->description }}
                    </p>
                @endisset
            </div>
            <div class="text-gray-900 dark:text-gray-100">
                @if($products->isNotEmpty())
                    <div class="grid grid-cols-2 gap-10 p-6 dark:bg-gray-800 shadow-sm sm:grid-cols-4 sm:rounded-lg">
                        @foreach($products as $product)
                            <div class="text-gray-900 dark:text-gray-100">
                                <div>
                                    <img style="width:auto;" src="/img/products/{{ $product->image }}" alt="Imagem de {{ $product->name }}"/>
                                </div>
                                <div>
                                    <p>
                                        {{ $product->name }}
                                    </p>
                                </div>
                                <div class="sm:flex sm:justify-between">
                                    <div>
                                        R$ {{ number_format($product->sale_price, 2, ',', '.') }}
                                    </div>
                                    <div>
                                        <x-nav-link href="{{ route('products.show', ['url' => $shop->url, 'name' =>  $product->name]) }}">
                                            Ver Detalhes
                                        </x-nav-link>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            Nenhum produto cadastrado ainda
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
