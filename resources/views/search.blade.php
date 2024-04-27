<x-app-layout>
    <div class="py-12 w-full">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                @isset($searchText)
                    Exibindo Resultados da Pesquisa: '{{ $searchText }}'
                @else
                    Exibindo Todos os Resultados
                @endisset
            </h2>

            <x-form-search />

            @if($results->isNotEmpty())
                <div class="mt-4">
                    {{ $results->links() }}
                </div>
                @foreach($results as $result)
                    <ul class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="flex justify-between items-center p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex items-center">
                                <li>
                                    <h1 class="mb-4 font-semibold text-xl">
                                        {{ $result->name }}
                                    </h1>
                                </li>
                            </div>

                            <div class="flex items-center">
                                @if($searchType == 'product')
                                    <li>
                                        <x-nav-link href="{{ route('products.show', ['url' => $result->shop->url, 'name' =>  $result->name]) }}">
                                            Ver Detalhes
                                        </x-nav-link>
                                    </li>
                                @elseif($searchType == 'shop')
                                    <li>
                                        <x-nav-link href="{{ route('shop.show', $result->url) }}">
                                            Ver Detalhes
                                        </x-nav-link>
                                    </li>
                                @endif
                            </div>
                        </div>
                    </ul>
                @endforeach

                <div class="mt-4">
                    {{ $results->links() }}
                </div>
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
