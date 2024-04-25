{{-- Aqui vai ter um botão para cancelar encomenda (deletar) --}}
<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('commissions.show', $commission->id) }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Encomenda para a loja
                        <a href="/shop/{{ $commission->shop->url }}">
                            {{ $commission->shop->name }}
                        </a>
                    </h2>
                    <p class="@if($commission->status->id > 1 and $commission->status->id < 6)
                                   text-yellow-300
                              @else
                                   text-green-500
                              @endif ">
                        {{ $commission->status->description }}
                    </p>
                    <p class="text-gray-200">
                        Data: {{ date('d/m/Y', strtotime($commission->created_at)) }}
                    </p>
                    <p class="text-gray-200">
                        Última atualização: {{ date('d/m/Y', strtotime($commission->updated_at)) }}
                    </p>
                </section>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section id="products">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Resumo de Produtos
                        </h2>
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

                        @foreach($commissionProducts as $commissionProduct)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="flex items-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img style="width:50px;"
                                         src="/img/products/{{ $commissionProduct->product->image }}"
                                         alt="Imagem de {{ $commissionProduct->product->name }}"/>
                                    <a class="pl-4"
                                       href="/shop/{{ $commission->shop->url }}/{{ $commissionProduct->product->name }}">
                                        {{ $commissionProduct->product->name }}
                                    </a>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $commissionProduct->quantity }} x
                                </td>
                                <td class="px-6 py-4 text-right">
                                    R$ {{ number_format($commissionProduct->product->price, 2, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <h2 class="flex justify-end mt-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Total: {{ number_format($commission->total, 2, ',', '.') }}
                    </h2>
                </section>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Endereço de Entrega
                        </h2>
                    </header>
                </section>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section id="shipping_address" class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Opção de Pagamento
                        </h2>
                        @if($commission->payment == 'credit')
                            <p class="mt-4 text-gray-200">Vou pagar com cartão de crédito.</p>
                        @else
                            <p class="mt-4 text-gray-200">Vou pagar com PIX.</p>
                        @endif
                    </header>
                </section>
            </div>

            <div class="flex justify-between">
                <x-secondary-button>
                    Cancelar Encomenda
                </x-secondary-button>

                <x-primary-button>
                    Realizar Pagamento
                </x-primary-button>
            </div>

        </div>
    </div>
</x-app-layout>
