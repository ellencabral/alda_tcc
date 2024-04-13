<x-app-layout>
    <div class="py-12 w-full">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                @isset($search)
                    Exibindo Resultados para '{{ $search }}'
                @else
                    Exibindo todos os resultados
                @endisset
            </h2>

            <form class="mt-4" action="#" method="GET">
                <x-text-input class="w-full" type="text" name="search" :value="old('search')" placeholder="Search Products" />
                <x-secondary-button class="mt-4" type="submit">Search</x-secondary-button>
            </form>

            @if(!$results->isEmpty())
                <p class="mt-4 text-gray-900 dark:text-gray-100">
                    {{ $results->count() }} resultados encontrados
                </p>
                @foreach($results as $result)
                    <ul class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="flex justify-between items-center p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex items-center">
                                <li>
                                    <img class="mr-4" style="width:50px;" src="/img/products/{{ $result->image }}" alt="Imagem de {{ $result->description }}"/>
                                </li>
                                <li>
                                    <h1 class="mb-4 font-semibold text-xl">
                                        {{ $result->description }}
                                    </h1>
                                </li>
                            </div>

                            <div class="flex items-center">
                                <li>
                                    <x-nav-link href="{{ route('products.show', ['url' => $result->shop->url, 'description' =>  $result->description]) }}">
                                        Ver Detalhes
                                    </x-nav-link>
                                </li>
                                <li>
                                    @if(Auth::user()->hasRole('artisan') && $result->shop_id === Auth::user()->shop->id)
                                        <x-nav-link href="{{ route('artisan.products.edit', $result->id) }}">
                                            Editar
                                        </x-nav-link>
                                    @else
                                        <x-nav-link href="#">
                                            Comprar
                                        </x-nav-link>
                                    @endif
                                </li>
                            </div>
                        </div>
                    </ul>
                @endforeach
            @else
                <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Nenhum resultado encontrado
                    </div>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
