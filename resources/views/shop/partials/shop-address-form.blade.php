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
            {{--    <li>--}}
            {{--        <x-nav-link href="{{ route('artisan.shop.address.edit') }}">--}}
            {{--            Editar endereço--}}
            {{--        </x-nav-link>--}}
            {{--    </li>--}}
        </ul>

        <x-danger-button class="mt-4"
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-shop-address-deletion')"
        >{{ __('Remove') }} Endereço</x-danger-button>

        <x-modal name="confirm-shop-address-deletion" :show="$errors->shopAddressDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('artisan.shop.address.remove') }}" class="p-6">
                @csrf
                @method('patch')

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Tem certeza que deseja deletar este endereço?
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Este endereço será excluído permanentemente.
                </p>

                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('Password') }}"
                    />

                    <x-input-error :messages="$errors->shopAddressDeletion->get('password')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Delete') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    @else
        <div class="mt-4" x-data="{ open: false }">
            <x-secondary-button x-on:click="open = ! open">
                Armazenar um novo endereço
            </x-secondary-button>
            <div x-show="open" class="mt-4 max-w-xl">
                <x-form-address :action="route('artisan.shop.address.update', $shop->id)"
                                :address="false" :update="true" />
            </div>
        </div>
    @endif
</section>
