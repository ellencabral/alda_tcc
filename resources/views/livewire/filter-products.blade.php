<div class="flex flex-col justify-end">
    <x-select-input class="max-w-48 mt-4" wire:model.change="filter">
        <option value="alphabetical_order">Ordem alfabética</option>
        <option value="lowest_sale_price">Menor preço</option>
        <option value="highest_sale_price">Maior preço</option>
        <option value="most_recent">Mais recente</option>
    </x-select-input>

    <x-results-list :results="$results" :searchType="$searchType" />
</div>
