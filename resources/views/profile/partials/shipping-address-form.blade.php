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

    <div class="mt-4" x-data="{ open: false }">
        <x-secondary-button x-on:click="open = ! open">
            Armazenar um novo endereço
        </x-secondary-button>
        <div x-show="open" class="mt-4 max-w-xl">
            <x-form-address :action="route('shipping-address.store')"
                                     :address="false" />
        </div>
    </div>
</section>
