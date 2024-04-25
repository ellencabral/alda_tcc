<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Breadcrumbs::render('cart') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status') === 'product-added')
                <p x-data="{ show: true }"
                   x-show="show"
                   class="text-sm text-gray-600 dark:text-gray-400" >
                    Produto adicionado na sua sacola de compras
                </p>
            @endif
            @if($items->isNotEmpty())

                <h2 class="p-4 font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                    Fazendo encomenda para {{ $shop->name }}
                </h2>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <p class="p-4 text-gray-200">
                        @if($items->count() == 1)
                            Sua sacola tem {{ $items->count() }} produto
                        @else
                            Sua sacola tem {{ $items->count() }} produtos
                        @endif
                    </p>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Produto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Preço
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantidade
                            </th>

                            <th scope="col" class="px-6 py-3">
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($items as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img style="width:50px;" src="/img/products/{{ $item->options->image }}" alt="Imagem de {{ $item->name }}"/>
                                    <span class="pl-4">
                                        {{ $item->name }}
                                    </span>
                                </th>
                                <td class="px-6 py-4">R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('cart.edit', $item->rowId) }}" method="post">
                                        @csrf @method('patch')
                                        <x-text-input type="number"
                                                      name="quantity"
                                                      value="{{ old('qty', $item->qty) }}"
                                                      required />
                                        <x-primary-button class="ml-2">
                                            Editar
                                        </x-primary-button>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('cart.remove', $item->rowId) }}" method="post">
                                        @csrf @method('delete')
                                        <x-danger-button>
                                            {{ __('Remove') }}
                                        </x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <h2 class="py-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Subtotal: {{ \Cart::subtotal(2, ',', '.') }}
                </h2>
                <div class="flex justify-end">
                    <x-secondary-button class="mr-2">
                        <a href="{{ route('cart.destroy') }}">
                            Limpar sacola
                        </a>
                    </x-secondary-button>
                    <x-primary-button>
                        <a href="{{ route('checkout.index') }}">
                            Continuar encomenda
                        </a>
                    </x-primary-button>
                </div>
            @else
                <div class="p-6 text-gray-900 dark:text-gray-100 mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    Sua sacola está vazia
                </div>
            @endif

        </div>
    </div>


</x-app-layout>
