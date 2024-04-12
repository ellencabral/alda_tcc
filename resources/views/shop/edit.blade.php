<x-artisan-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Informações da Loja
                            </h2>
                        </header>

                        <form method="POST" action="{{ route('artisan.shop.update', $shop->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $shop->name)" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div>

                                <x-input-label for="url" :value="'Url da loja'" />
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    www.site.com/urldaloja
                                </p>
                                <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url', $shop->url)" required autofocus autocomplete="url" />
                                <x-input-error :messages="$errors->get('url')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Saved.') }}</p>
                                @endif
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
                                Deletar Loja
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Depois que sua loja for excluída, todos os seus produtos serão excluídos permanentemente.
                            </p>
                        </header>

                        <x-danger-button
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-shop-deletion')"
                            >{{ __('Delete') }}</x-danger-button>

                        <x-modal name="confirm-shop-deletion" :show="$errors->shopDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('artisan.shop.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    Tem certeza que quer deletar sua loja?
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    Depois que sua loja for excluída, todos os seus produtos serão excluídos permanentemente. Insira sua senha para deletar permanentemente sua loja.
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

                                    <x-input-error :messages="$errors->shopDeletion->get('password')" class="mt-2" />
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
</x-artisan-layout>
