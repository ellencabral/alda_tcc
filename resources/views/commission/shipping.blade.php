<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Entrega
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Endereço de Entrega
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Escolha uma forma de receber a sua encomenda
                        </p>
                    </header>
                    <div x-data="{ shipping: 'ship' }">
                        <div class="flex items-center">
                            <x-text-input type="radio"
                                          id="ship"
                                          name="option"
                                          value="ship"
                                          x-model="shipping"
                                          checked />
                            <x-input-label for="ship"
                                           class="ml-2"
                                           :value="'Quero receber no meu endereço'"/>
                        </div>
                        <div class="flex items-center">
                            <x-text-input type="radio"
                                          id="pick"
                                          name="option"
                                          value="pick"
                                          x-model="shipping" />
                            <x-input-label for="pick"
                                           class="ml-2"
                                           :value="'Quero buscar no local'"/>
                        </div>

                        <div x-show="shipping == 'pick'">
                            @if($shop->street)  {{-- se a loja possui endereço --}}
                                Informações de Endereço da Loja {{ $shop->name }}
                            @else
                                Esta loja não possui endereço
                            @endif
                        </div>

                        <div x-show="shipping == 'ship'">
                            @if($user->shipping_addresses()->get()) {{-- se o usuário nao tiver um endereço --}}
                            <x-nav-link>
                                Ir para página de armazenar um endereço
                            </x-nav-link>
                            @else
                                <x-nav-link>
                                    Dar opção de usar aquele endereço ou outro
                                </x-nav-link>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
