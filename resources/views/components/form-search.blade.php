<form class="w-full" action="{{ route('search-results') }}" method="GET">
    <div class="flex items-center justify-center py-2 px-4 border border-gray-400 rounded-lg">
        <select class="p-0 w-48 sm:w-32 text-sm cursor-pointer border-none text-gray-600 focus:ring-transparent" name="search_type">
            <option class="p-2" value="Produtos">Produtos</option>
            <option value="Lojas">Lojas</option>
        </select>

        <span class="mr-4">|</span>

        <input class="p-0 w-full border-none focus:bg-transparent focus:ring-transparent text-primary-700"
               type="text"
               name="search_text"
               :value="old('search_text')"
               placeholder="Digite a sua pesquisa..." />

        <button class="hover:text-primary-800 transition ease-in-out duration-150">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>

    <x-input-error class="mt-2" :messages="$errors->get('search_type')" />
</form>
