<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Breadcrumbs::render('shipping-address.index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section id="shipping-address">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Atualizar endereços
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Atualize seus endereços de entrega.
                        </p>
                    </header>
                    @if($addresses)
                        <div class="grid grid-cols-2 gap-6">
                            @foreach($addresses as $address)
                                <ul class="mt-4 border border-gray-500 p-4 rounded text-gray-200">
                                    <li>
                                        Rua: {{ $address->street }}
                                    </li>
                                    <li>
                                        Número: {{ $address->number }}
                                    </li>
                                    @if($address->complement)
                                        <li>
                                            Complemento: {{ $address->complement }}
                                        </li>
                                    @endif
                                    <li>
                                        Bairro: {{ $address->locality }}
                                    </li>
                                    <li>
                                        Cidade: {{ $address->city }}
                                    </li>
                                    <li>
                                        Estado: {{ $address->region_code }}
                                    </li>
                                    <li>
                                        CEP: {{ $address->postal_code }}
                                    </li>
                                    @if($address->is_default)
                                        <li>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                Este o é seu endereço de entrega padrão.
                                            </p>
                                        </li>
                                    @endif
                                    <li class="flex justify-end">
                                        <x-nav-link href="{{ route('profile.shipping-address.edit', $address->id) }}">
                                            Editar endereço
                                        </x-nav-link>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    @endif

                    <div class="mt-4">
                        <x-secondary-button>
                            <a href="{{ route('profile.shipping-address.create') }}">
                                Armazenar um novo endereço
                            </a>
                        </x-secondary-button>
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
