<x-app-layout>
    <div class="py-12 w-full">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                @isset($search)
                    Exibindo Resultados da Pesquisa: '{{ $search }}'
                @else
                    Exibindo Todos os Resultados
                @endisset
            </h2>

            <x-form-search :action="route('shop.search')" />

            @if(!$results->isEmpty())
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
                                <li>
                                    <x-nav-link href="{{ route('shop.show', $result->shop->url) }}">
                                        Ver Detalhes
                                    </x-nav-link>
                                </li>
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
