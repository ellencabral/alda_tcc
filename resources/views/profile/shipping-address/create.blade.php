<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Breadcrumbs::render('shipping-address.create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section id="shipping-address">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Atualizar endereços
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Atualize seus endereços de entrega.
                        </p>
                    </header>
                    <x-form-address :action="route('shipping-address.store')"
                                    :address="false" />
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
