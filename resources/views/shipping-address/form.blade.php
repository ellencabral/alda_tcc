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
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Endereço de Entrega
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Escolha uma forma de entrega
                            </p>
                        </header>

                        <form method="post" action="{{ route('shipping-address.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <div class="flex items-center">
                                <x-text-input type="radio"
                                              id="ship"
                                              name="option"
                                              value="1" />
                                <x-input-label for="ship"
                                               class="ml-2"
                                               :value="'Quero receber no meu endereço'"/>
                            </div>
                            <div class="flex items-center">
                                <x-text-input type="radio"
                                              id="pick"
                                              name="option"
                                              value="2" />
                                <x-input-label for="pick"
                                               class="ml-2"
                                               :value="'Quero buscar no local'"/>
                            </div>

                            @if($user->shipping_addresses())
                                <div>
                                    <x-input-label for="postal_code" :value="'CEP'" />
                                    <x-text-input class="mt-1 block w-full"
                                                  id="postal_code"
                                                  name="postal_code"
                                                  type="number"
                                                  :value="old('postal_code')"
                                                  required autofocus autocomplete="postal_code" />
                                    <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                                </div>

                                <div class="flex">
                                    <div class="w-full">
                                        <x-input-label for="street" :value="'Rua'" />
                                        <x-text-input class="mt-1 block w-full"
                                                      id="street"
                                                      name="street"
                                                      type="text"
                                                      :value="old('street')"
                                                      required autofocus autocomplete="street" />
                                        <x-input-error class="mt-2" :messages="$errors->get('street')" />
                                    </div>

                                    <div class="ml-4">
                                        <x-input-label for="number" :value="'Número'" />
                                        <x-text-input class="mt-1 block w-full"
                                                      id="number"
                                                      name="number"
                                                      type="number"
                                                      :value="old('number')"
                                                      required autofocus autocomplete="number" />
                                        <x-input-error class="mt-2" :messages="$errors->get('number')" />
                                    </div>
                                </div>

                                <div>
                                    <x-input-label for="complement" :value="'Complemento'" />
                                    <x-text-input class="mt-1 block w-full"
                                                  id="complement"
                                                  name="complement"
                                                  type="text"
                                                  :value="old('complement')"
                                                  required autofocus autocomplete="complement" />
                                    <x-input-error class="mt-2" :messages="$errors->get('complement')" />
                                </div>

                                <div>
                                    <x-input-label for="locality" :value="'Bairro'" />
                                    <x-text-input class="mt-1 block w-full"
                                                  id="locality"
                                                  name="locality"
                                                  type="text"
                                                  :value="old('locality')"
                                                  required autofocus autocomplete="locality" />
                                    <x-input-error class="mt-2" :messages="$errors->get('locality')" />
                                </div>

                                <div>
                                    <x-input-label for="city" :value="'Cidade'" />
                                    <x-text-input class="mt-1 block w-full"
                                                  id="city"
                                                  name="city"
                                                  type="text"
                                                  :value="old('city')"
                                                  required autofocus autocomplete="city" />
                                    <x-input-error class="mt-2" :messages="$errors->get('city')" />
                                </div>

                                <div>
                                    <x-input-label for="region_code" :value="'Estado'" />
                                    <x-text-input class="mt-1 block w-full"
                                                  id="region_code"
                                                  name="region_code"
                                                  type="text"
                                                  :value="old('region_code')"
                                                  required autofocus autocomplete="region_code" />
                                    <x-input-error class="mt-2" :messages="$errors->get('region_code')" />
                                </div>

                                <x-primary-button>
                                    Salvar
                                </x-primary-button>
                            @else
                                <div>
                                    Dados do Meu Endereço Principal
                                </div>
                            @endif
                        </form>
                    </section>
                </div>
            </div>
            <div class="flex justify-end">
                <form method="post" action="{{ route('commission.store') }}">
                    <input type="hidden" />
                    <x-primary-button>
                        Finalizar Encomenda
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
