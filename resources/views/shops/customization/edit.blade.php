<x-dashboard-layout>
    <x-slot name="heading">
        Customização
    </x-slot>

    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('shops.customization.edit') }}
    </x-slot>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Customização da Loja
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Atualize as informações da sua loja.
            </p>
        </header>
    </section>
</x-dashboard-layout>
