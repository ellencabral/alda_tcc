<section>
    <form class="mt-4 flex flex-col justify-between" action="{{ route('search-results') }}" method="GET">
        <div class="flex w-full">
            <x-select-input name="search_type" class="max-w-32 mr-4">
                <option value="Produtos">Produtos</option>
                <option value="Lojas">Lojas</option>
            </x-select-input>

            <x-text-input class="w-full"
                          type="text"
                          name="search_text"
                          :value="old('search_text')"
                          placeholder="Digite sua pesquisa..." />

            <x-primary-button class="ml-4">Pesquisar</x-primary-button>
        </div>

        <x-input-error class="mt-2" :messages="$errors->get('search_type')" />

    </form>
</section>
