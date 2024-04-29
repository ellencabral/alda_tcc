<section>
    <div class="mt-4">
        {{ $results->links() }}
    </div>

    @foreach($results as $result)
        <ul class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex justify-between items-center p-6 text-gray-900 dark:text-gray-100">
                <div class="flex items-center">
                    <li>
                        <img style="width:60px;" src="/img/products/{{ $result->image }}" alt="Imagem de {{ $result->name }}"/>
                    </li>
                    <li>
                        <h1 class="mb-4 font-semibold text-xl">
                            {{ $result->name }}
                        </h1>
                    </li>
                </div>
                <div class="flex items-center">
                    @if($searchType == 'Produtos')
                        <li>
                            <p>{{ $result->priceFormat() }}</p>
                        </li>
                        <li>
                            <x-nav-link href="{{ route('products.show', ['url' => $result->shop->url, 'name' =>  $result->name]) }}">
                                Ver Detalhes
                            </x-nav-link>
                        </li>
                    @elseif($searchType == 'Lojas')
                        <li>
                            <x-nav-link href="{{ route('shop.show', $result->url) }}">
                                Ver Detalhes
                            </x-nav-link>
                        </li>
                    @endif
                </div>
            </div>
        </ul>
    @endforeach

    <div class="mt-4">
        {{ $results->links() }}
    </div>
</section>
