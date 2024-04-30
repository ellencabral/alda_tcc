<x-artisan-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Configurações da Loja
        </h2>
    </x-slot>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <div class="max-w-xl">
                    <x-nav-link href="{{ route('artisan.shops.information.edit') }}">
                        Editar Dados da Loja
                    </x-nav-link>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <x-nav-link href="{{ route('artisan.shops.customization.edit') }}">
                        Customizar
                    </x-nav-link>
                </div>
            </div>

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
                    <x-nav-link href="{{ route('artisan.shops.address.edit') }}">
                        @if($shop->street) Editar @else Adicionar @endif Endereço
                    </x-nav-link>

                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('shops.partials.delete-shop-form')
                </div>
            </div>
        </div>
    </div>
</x-artisan-layout>
