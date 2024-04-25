<section>
    <form class="mt-4 flex justify-between" action="{{ route('search') }}" method="GET">
        <x-text-input class="w-full"
                      type="text"
                      name="search"
                      :value="old('search')"
                      placeholder="Digite sua pesquisa..." />
        <x-primary-button class="ml-4">Pesquisar</x-primary-button>
    </form>
</section>
