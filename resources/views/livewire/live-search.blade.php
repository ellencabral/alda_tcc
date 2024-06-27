<div class="grid gap-8">
    <div class="flex px-4 py-2 justify-between border border-gray-400 rounded-lg focus:text-primary-700 focus:ring-transparent focus:border-gray-400">
        <input class="w-full border-none bg-transparent p-0"
               type="text"
               wire:model.live="search"
               placeholder="Digite sua pesquisa..."/>
        <button class="hover:text-primary-800 transition ease-in-out duration-150">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>

    <h1 class="font-extrabold text-4xl text-gray-800">
        @isset($category->description)
            Exibindo Resultados da Categoria {{ $category->description }}
        @else
            Exibindo Resultados da Pesquisa de {{ $searchType }}
        @endisset
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
                Pesquisa: '{{ $search }}'.
            @else
                Todos os resultados de {{ $searchType }}
                @isset($category->description)
                    da categoria {{ $category->description }}
                @endisset
                .
            @endif
        </p>
    </div>

    <hr/>

    <x-results-list :results="$results" :searchType="$searchType" />
</div>
