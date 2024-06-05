<x-app-layout>
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('shipping-address.index') }}
    </x-slot>
    <x-slot name="heading">
        Endereços de Entrega
    </x-slot>

    <section class="grid sm:grid-cols-2 gap-6">
        <header class="w-full flex justify-between items-center">
            <x-link href="{{ route('profile.shipping-address.create') }}">
                Adicionar um novo endereço
            </x-link>
            <span>
                <i class="fa-solid fa-plus text-gray-600"></i>
            </span>
        </header>

        @if($addresses->isEmpty())
            <hr/>
            <p class="text-gray-600 text-sm">
                Nenhum endereço de entrega cadastrado.
            </p>
        @else
            @foreach($addresses as $address)
                <ul class="flex flex-col justify-between gap-2 border p-4 rounded @if($address->is_default) border-primary-700 @else border-gray-400 @endif ">
                    @if($address->is_default)
                        <li>
                            <p class="text-sm text-primary-700">
                                Este o é seu endereço de entrega padrão.
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
                    <li class="flex justify-end">
                        <x-link-button class="h-8" href="{{ route('profile.shipping-address.edit', $address->id) }}">
                            Editar endereço
                            <i class="ml-2 fa-solid fa-pen-to-square"></i>
                        </x-link-button>
                    </li>
                </ul>
            @endforeach
        @endif
    </section>
</x-app-layout>
