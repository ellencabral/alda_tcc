<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Resumo da Encomenda
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Fazendo encomenda para a loja <a href="/shop/{{ $shop->url }}">{{ $shop->name }}</a>.
        </p>
    </header>

    <table class="mt-4 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-4 ">
                Produto
            </th>
            <th scope="col" class="px-6 py-4">
                Quantidade
            </th>
            <th scope="col" class="px-6 py-4 text-right">
                Preço
            </th>
        </tr>
        </thead>
        <tbody>

        @foreach($items as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="flex items-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <img style="width:50px;" src="/img/products/{{ $item->options->image }}" alt="Imagem de {{ $item->name }}"/>
                    <span class="pl-4">
                        {{ $item->name }}
                    </span>
                </th>
                <td class="px-6 py-4">
                    {{ $item->qty }} x
                </td>
                <td class="px-6 py-4 text-right">
                    R$ {{ number_format($item->price, 2, ',', '.') }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2 class="flex justify-end mt-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Total: {{ $cart_total }}
    </h2>
</section>
