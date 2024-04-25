<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('commissions.show', $commission->id) }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('commissions.partials.commission-info')
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('commissions.partials.products-info')
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('commissions.partials.shipping-address-info')
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('commissions.partials.payment-info')
            </div>

            <div class="flex justify-between">
                <x-secondary-button>
                    Cancelar Encomenda
                </x-secondary-button>

                <x-primary-button>
                    Realizar Pagamento
                </x-primary-button>
            </div>

        </div>
    </div>
</x-app-layout>
