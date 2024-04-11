<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Produto '{{ $product->description }}'

        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Informações do Produto
                            </h2>
                        </header>

                        <img src="/img/products/{{ $product->image }}" class="mt-4" style="width: 200px" alt="Imagem de {{ $product->description }}"/>

                        <form method="POST" action="{{ route('products.update', $product->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="image" :value="'Imagem'" />
                                <x-text-input id="image"
                                              class="block mt-1 w-full"
                                              type="file"
                                              name="image"
                                              :value="old('image')"
                                              autofocus
                                              autocomplete="image" />
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="description" :value="'Título'" />
                                <x-text-input id="description"
                                              class="block mt-1 w-full"
                                              type="text"
                                              name="description"
                                              :value="old('description', $product->description)"
                                              required autofocus
                                              autocomplete="description"
                                              placeholder="Digite o nome do produto"/>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="sale_price" :value="'Preço de Venda'" />
                                <x-text-input id="sale_price"
                                              class="block mt-1 w-full"
                                              type="number"
                                              name="sale_price"
                                              :value="old('sale_price', $product->sale_price)"
                                              required autofocus
                                              autocomplete="sale_price"
                                              placeholder="R$ 0"/>
                                <x-input-error :messages="$errors->get('sale_price')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="observation" :value="'Observação'" />
                                <x-textarea-input id="observation" class="block mt-1 w-full"
                                                  name="observation"
                                                  autofocus autocomplete="observation"
                                                  placeholder="Campo opcional">
                                    {{ $product->observation }}
                                </x-textarea-input>
                                <x-input-error :messages="$errors->get('observation')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="categories" :value="'Categoria'"/>
                                <x-select-input id="categories"
                                                name="category_id"
                                                class="block mt-1 w-full">
                                    <option value="">Escolha uma categoria</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->description }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Deletar Produto
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                O seu produtos será excluído permanentemente.
                            </p>
                        </header>

                        <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion')"
                        >{{ __('Delete') }}</x-danger-button>

                        <x-modal name="confirm-product-deletion" :show="$errors->productDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('products.destroy', $product->id) }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    Tem certeza que quer deletar este produto?
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    O produto {{ $product->description }} será excluído permanentemente. Insira sua senha para deletar permanentemente o produto.
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

                                    <x-input-error :messages="$errors->productDeletion->get('password')" class="mt-2" />
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
                    </section>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>