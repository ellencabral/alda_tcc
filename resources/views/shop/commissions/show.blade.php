<x-artisan-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('shop.commissions.show', $commission->id) }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('shop.commissions.partials.commission-info')
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('shop.commissions.partials.products-info')
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('shop.commissions.partials.client-info')
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('shop.commissions.partials.shipping-address-info')
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('shop.commissions.partials.payment-info')
            </div>

            <div class="flex justify-between">
                <x-secondary-button>
                    Alterar Status
                </x-secondary-button>
            </div>
        </div>
    </div>
</x-artisan-layout>
