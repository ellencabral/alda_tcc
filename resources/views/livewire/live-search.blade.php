<div>
    <h2 class="mb-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        @if($search)
            Exibindo Resultados da Pesquisa de {{ $searchType }}: '{{ $search }}'
        @elseif($category)
            Exibindo Resultados da Categoria '{{ $category->description }}'
        @else
            Exibindo Todos os Resultados de {{ $searchType }}
        @endif
    </h2>

    <x-text-input class="w-full" type="text" wire:model.live="search" placeholder="Digite sua pesquisa..."/>

    <x-select-input class="max-w-48 mt-4" wire:model.change="filter">
        <option value="alphabetical_order">Ordem alfabética</option>
        @if($searchType == 'Produtos')
            <option value="lowest_sale_price">Menor preço</option>
            <option value="highest_sale_price">Maior preço</option>
        @endif
        <option value="most_recent">Mais recente</option>
    </x-select-input>

    <x-results-list :results="$results" :searchType="$searchType" />
</div>
