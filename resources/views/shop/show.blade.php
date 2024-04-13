<x-app-layout>
    <div class="py-12">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Perfil da Loja '{{ $shop->name }}'
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
            <ul class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(!$products->isEmpty())
                        <ul class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            @foreach($products as $product)
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <li>
                                        <img style="width:400px;" src="/img/products/{{ $product->image }}" alt="Imagem de {{ $product->description }}"/>
                                    </li>
                                    <li>
                                        {{ $product->description }}
                                    </li>
                                    <li>
                                        <x-nav-link href="{{ route('products.show', ['url' => $shop->url, 'description' =>  $product->description]) }}">
                                            Ver Detalhes
                                        </x-nav-link>
                                    </li>

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
                            @endforeach
                        </ul>
                    @else
                        <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                Nenhum produto cadastrado ainda
                            </div>
                        </div>
                    @endif
                </div>
            </ul>
        </div>
    </div>
</x-app-layout>
