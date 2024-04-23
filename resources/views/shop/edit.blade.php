<x-artisan-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('shop.edit', $shop->name) }}
    </x-slot>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <div class="max-w-xl">
                    @include('shop.partials.update-shop-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('shop.partials.shop-address-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('shop.partials.delete-shop-form')
                </div>
            </div>
        </div>
    </div>
</x-artisan-layout>
