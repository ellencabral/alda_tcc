<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Opção de Entrega
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Escolha um endereço para receber a sua encomenda.
        </p>
    </header>

    @if($addresses->isNotEmpty()) {{-- se o usuário possui um endereço --}}

        <div class="grid grid-cols-2 gap-6">
            @foreach($addresses as $address)
                <ul class="mt-4 border border-gray-500 p-4 rounded text-gray-200">
                    <li>
                        <div class="flex items-center">
                            <input type="radio"
                                   id="is_default"
                                   name="is_default"
                                   value="{{ $address->id }}" {{ $address->is_default ? 'checked' : '' }}>
                            <x-input-label for="is_default"
                                           class="ml-2"
                                           :value="'Enviar para este endereço'"/>
                        </div>
                    </li>
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
                        <li class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Esse é seu endereço de entrega padrão
                        </li>
                    @endif
                </ul>
            @endforeach
        </div>

        <x-secondary-button class="mt-4">
            <a href="/profile#shipping-address" target=”_blank”>
                Adicionar outro endereço
            </a>
        </x-secondary-button>
    @else {{-- se o usuário não possui endereço --}}
        <x-secondary-button class="mt-4">
            <a href="/profile#shipping-address" target=”_blank”>
                Adicionar um endereço
            </a>
        </x-secondary-button>
    @endif
</section>
