<div class="grid gap-8">
    <input class="w-full border border-gray-400 rounded-lg focus:text-primary-700 focus:ring-transparent focus:border-gray-400"
                  type="text"
                  wire:model.live="search"
                  placeholder="Digite sua pesquisa..."/>

    <h1 class="font-extrabold text-4xl text-gray-800">
        Exibindo Resultados da Pesquisa de {{ $searchType }}
    </h1>

    <div>
        <div class="flex justify-end items-center">
            <x-select-input class="max-w-48" wire:model.change="filter">
                <option value="alphabetical_order">Ordem alfabética</option>
                @if($searchType == 'Produtos')
                    <option value="lowest_sale_price">Menor preço</option>
                    <option value="highest_sale_price">Maior preço</option>
                @endif
                <option value="most_recent">Mais recente</option>
            </x-select-input>
        </div>

        <p class="text-gray-600 text-sm mt-4">
            @if($search)
                Pesquisa: '{{ $search }}'
            @elseif($category)
                Categoria: '{{ $category->description }}'
            @else
                Todos os resultados de {{ $searchType }}.
            @endif
        </p>
    </div>

    <hr/>

    <x-results-list :results="$results" :searchType="$searchType" />
</div>
