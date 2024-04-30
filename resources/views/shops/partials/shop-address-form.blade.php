<section id="shipping-address">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Endereço da Loja
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Atualize o endereço da sua loja
        </p>
    </header>

    @if($shop->street)
        <ul>
            <li>
                Rua: {{ $shop->street }}
            </li>
            <li>
                Número: {{ $shop->number }}
            </li>
            @if($shop->complement)
                <li>
                    Complemento: {{ $shop->complement }}
                </li>
            @endif
            <li>
                Bairro: {{ $shop->locality }}
            </li>
            <li>
                Cidade: {{ $shop->city }}
            </li>
            <li>
                Estado: {{ $shop->region_code }}
            </li>
            <li>
                CEP: {{ $shop->postal_code }}
            </li>
        </ul>

        <x-secondary-button class="mt-4">
            <a href="{{ route('artisan.shops.address.edit') }}">
                Editar endereço
            </a>
        </x-secondary-button>
    @else
        <x-secondary-button class="mt-4">
            <a href="{{ route('artisan.shops.address.create') }}">Armazenar um novo endereço</a>
        </x-secondary-button>
    @endif
</section>
