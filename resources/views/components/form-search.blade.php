<section>
    <form class="mt-4 flex flex-col justify-between" action="{{ route('search') }}" method="GET">
        <div class="flex w-full">
            <x-select-input name="search_type" class="mr-4">
                <option value="product" {{ old('search_type') ? 'selected' : '' }}>Produtos</option>
                <option value="shop" {{ old('search_type') ? 'selected' : '' }}>Lojas</option>
                <option value="user" {{ old('search_type') ? 'selected' : '' }}>Usuários</option>
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
