<x-artisan-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Breadcrumbs::render('shop.address.edit', $shop->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Editar Endereço
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Atualize o endereço da sua loja
                            </p>
                        </header>

                        <form method="post" action="{{ route('artisan.shop.address.update', $shop) }}">
                            @csrf
                            @method('patch')

                            <div class="mt-2" x-data>
                                <x-input-label for="postal_code" :value="'CEP'" />
                                <x-text-input class="mt-1 block w-full"
                                              id="postal_code"
                                              name="postal_code"
                                              type="text"
                                              :value="old('postal_code', $shop->postal_code)"
                                              required autofocus autocomplete="postal_code"
                                              x-mask="99999 999" placeholder="99999-999"
                                              />
                                <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                            </div>

                            <div class="flex mt-2">
                                <div class="w-full">
                                    <x-input-label for="street" :value="'Rua'" />
                                    <x-text-input class="mt-1 block w-full"
                                                  id="street"
                                                  name="street"
                                                  type="text"
                                                  :value="old('street', $shop->street)"
                                                  required autofocus autocomplete="street"
                                                  />
                                    <x-input-error class="mt-2" :messages="$errors->get('street')" />
                                </div>

                                <div class="ml-4">
                                    <x-input-label for="number" :value="'Número'" />
                                    <x-text-input class="mt-1 block w-full"
                                                  id="number"
                                                  name="number"
                                                  type="number"
                                                  :value="old('number', $shop->number)"
                                                  required autofocus autocomplete="number" />
                                    <x-input-error class="mt-2" :messages="$errors->get('number')" />
                                </div>
                            </div>

                            <div class="mt-2">
                                <x-input-label for="complement" :value="'Complemento'" />
                                <x-text-input class="mt-1 block w-full"
                                              id="complement"
                                              name="complement"
                                              type="text"
                                              :value="old('complement', $shop->complement)"
                                              autofocus autocomplete="complement" />
                                <x-input-error class="mt-2" :messages="$errors->get('complement')" />
                            </div>

                            <div class="mt-2">
                                <x-input-label for="locality" :value="'Bairro'" />
                                <x-text-input class="mt-1 block w-full"
                                              id="locality"
                                              name="locality"
                                              type="text"
                                              :value="old('locality', $shop->locality)"
                                              required autofocus autocomplete="locality"
                                              />
                                <x-input-error class="mt-2" :messages="$errors->get('locality')" />
                            </div>

                            <div class="mt-2">
                                <x-input-label for="city" :value="'Cidade'" />
                                <x-text-input class="mt-1 block w-full"
                                              id="city"
                                              name="city"
                                              type="text"
                                              :value="old('city', $shop->city)"
                                              required autofocus autocomplete="city"
                                              />
                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                            </div>

                            <div class="mt-2">
                                <x-input-label for="region_code" :value="'Estado'" />
                                <x-text-input class="mt-1 block w-full"
                                              id="region_code"
                                              name="region_code"
                                              type="text"
                                              :value="old('region_code', $shop->region_code)"
                                              required autofocus autocomplete="region_code"
                                              />
                                <x-input-error class="mt-2" :messages="$errors->get('region_code')" />
                            </div>
                            <x-primary-button class="mt-4">
                                Salvar
                            </x-primary-button>
                        </form>
                    </section>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Deletar Endereço
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Este endereço será excluído permanentemente.
                            </p>
                        </header>


                    </section>
                </div>
            </div>
        </div>
    </div>
</x-artisan-layout>
