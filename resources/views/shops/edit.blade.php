<x-dashboard-layout>
    <x-slot name="heading">
        Configurações da Loja
    </x-slot>

    <x-nav-link href="{{ route('artisan.shops.information.edit') }}">
        Editar Dados da Loja
    </x-nav-link>

    <x-nav-link href="{{ route('artisan.shops.customization.edit') }}">
        Customizar
    </x-nav-link>

    <x-nav-link href="{{ route('artisan.shops.address.edit') }}">
        @if($shop->street) Editar @else Adicionar @endif Endereço
    </x-nav-link>

    @include('shops.partials.delete-shop-form')

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl">

            {{--                        <ul>--}}
            {{--                            <li>--}}
            {{--                                Rua: {{ $shop->street }}--}}
            {{--                            </li>--}}
            {{--                            <li>--}}
            {{--                                Número: {{ $shop->number }}--}}
            {{--                            </li>--}}
            {{--                            @if($shop->complement)--}}
            {{--                                <li>--}}
            {{--                                    Complemento: {{ $shop->complement }}--}}
            {{--                                </li>--}}
            {{--                            @endif--}}
            {{--                            <li>--}}
            {{--                                Bairro: {{ $shop->locality }}--}}
            {{--                            </li>--}}
            {{--                            <li>--}}
            {{--                                Cidade: {{ $shop->city }}--}}
            {{--                            </li>--}}
            {{--                            <li>--}}
            {{--                                Estado: {{ $shop->region_code }}--}}
            {{--                            </li>--}}
            {{--                            <li>--}}
            {{--                                CEP: {{ $shop->postal_code }}--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}


        </div>
    </div>


</x-dashboard-layout>
