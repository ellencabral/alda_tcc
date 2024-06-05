<section class="grid gap-4">
    <header class="flex items-center gap-2">
        <i class="fa-solid fa-truck-fast"></i>
        <h3 class="text-xl font-bold">
            Endereço de Entrega
        </h3>
    </header>
    <p class="text-sm text-gray-600">
        Escolha um endereço para receber a sua encomenda.
    </p>

    @if($shippingAddresses->isEmpty()) {{-- se o usuário não possui um endereço --}}
        <hr/>
        <div class="w-full flex justify-between items-center">
            <x-link href="{{ route('profile.shipping-address.create') }}">
                Adicionar um novo endereço
            </x-link>
            <span>
                    <i class="fa-solid fa-plus text-gray-600"></i>
                </span>
        </div>
    @else {{-- se o usuário possui endereço --}}
        <div class="grid sm:grid-cols-2 gap-6">
            @foreach($shippingAddresses as $address)
                <ul class="flex flex-col justify-between gap-2 border p-4 rounded @if($address->is_default) border-primary-700 @else border-gray-400 @endif ">
                    <li>
                        <div class="flex items-center">
                            <input type="radio"
                                   class="focus:ring-primary-700 checked:bg-primary-700 checked:focus:bg-primary-700 accent-primary-700"
                                   id="{{ $address->id }}"
                                   name="address_id"
                                   value="{{ $address->id }}" {{ $address->is_default ? 'checked' : '' }} />
                            <x-input-label for="{{ $address->id }}"
                                           class="ml-2"
                                           :value="'Enviar para este endereço'"/>
                        </div>
                    </li>

                    @if($address->is_default)
                        <li>
                            <p class="text-sm text-primary-700">
                                Esse é seu endereço de entrega padrão.
                            </p>
                        </li>
                    @endif
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
                </ul>
            @endforeach
        </div>
    @endif
</section>
