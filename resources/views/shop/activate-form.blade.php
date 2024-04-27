<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Breadcrumbs::render('shop.activate', $shop) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Informações para Ativar Loja
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Preencha as informações para ter acesso ao Painel de Controle do Artesão
                            </p>
                        </header>

                        <form x-data="{ option : '{{ old('option') ? old('option') : 'cpf' }}' }"
                              class="mt-6 space-y-6" method="post"
                              action="{{ route('shop.activate', $shop->id) }}">

                            @csrf @method('patch')

                            <div class="mt-2 flex items-center">
                                <x-text-input type="radio"
                                              id="option-cpf"
                                              name="option"
                                              value="cpf"
                                              x-model="option"
                                               />
                                <x-input-label for="option-cpf"
                                               class="ml-2"
                                               :value="'Preencher CPF'" />
                            </div>
                            <div class="mt-2 flex items-center">
                                <x-text-input type="radio"
                                              id="option-cnpj"
                                              name="option"
                                              value="cnpj"
                                              x-model="option"
                                               />
                                <x-input-label for="option-cnpj"
                                               class="ml-2"
                                               :value="'Preencher CNPJ'"/>
                            </div>

                            <template x-if="option == 'cpf'" >

                                <div class="max-w-xl" x-data>
                                    <x-text-input class="block mt-1 w-full"
                                                  type="text"
                                                  name="cpf"
                                                  :value="old('cpf')"
                                                  x-mask="999.999.999-99"
                                                  placeholder="000.000.000-00"/>
                                    <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
                                </div>
                            </template>
                            <template x-if="option == 'cnpj'">
                                <div class="max-w-xl" x-data>
                                    <x-text-input class="block mt-1 w-full"
                                                  type="text"
                                                  name="cnpj"
                                                  :value="old('cnpj')"
                                                  x-mask="99.999.999/9999-99"
                                                  placeholder="00.000.000/0000-00"/>
                                    <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
                                </div>
                            </template>

                            <x-primary-button class="mt-4">
                                Enviar
                            </x-primary-button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
