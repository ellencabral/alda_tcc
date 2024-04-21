<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Atualizar endereços
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Atualize seus endereços de entrega.
        </p>
    </header>
    @if($addresses)
        <ul class="mt-4 text-gray-200">
            @foreach($addresses as $address)
                <li>
                    Rua: {{ $address->street }}
                </li>
                <li>
                    Número: {{ $address->number }}
                </li>
                <li>
                    Complemento: {{ $address->complement }}
                </li>
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
                        Esse é seu endereço de entrega padrão
                    </li>
                @endif
                <li>
                    <x-nav-link href="{{ route('profile.shipping-address.edit', $address->id) }}">
                        Editar endereço
                    </x-nav-link>
                </li>
            @endforeach
        </ul>
    @endif

    <div class="mt-4" x-data="{ open: false }">
        <x-secondary-button x-on:click="open = ! open">
            Armazenar um novo endereço
        </x-secondary-button>
        <div x-show="open">
            <x-form-shipping-address :action="route('shipping-address.store')"
                                     :user="$user" />
        </div>
    </div>
</section>
