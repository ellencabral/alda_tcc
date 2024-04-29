<x-app-layout>
    <div class="py-12 w-full">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                @isset($searchText)
                    Exibindo Resultados da Pesquisa de {{ $searchType }}: '{{ $searchText }}'
                @else
                    Exibindo Todos os Resultados de {{ $searchType }}
                @endisset
            </h2>

            <x-form-search />

            @if($results->isNotEmpty())
                @if($searchType == 'Produtos')
                    <livewire:filter-products :search="$searchText" :searchType="$searchType" />
                @else
                    <x-results-list :results="$results" :searchType="$searchType" />
                @endif
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
