<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Breadcrumbs::render('commissions.checkout') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="post" action="{{ route('commissions.store') }}">
                @csrf
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div>
                        @include('commissions.partials.cart')
                    </div>
                </div>

                <div class="mt-6 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('commissions.partials.payment')
                    </div>
                </div>

                <div class="mt-6 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div>
                        @include('commissions.partials.shipping')
                    </div>
                </div>

                <input type="hidden" name="status_id" value="1"/>

                <div class="flex justify-end">
                    <x-primary-button class="mt-6" :disabled="$addresses->isEmpty() ? true : false">
                        Finalizar Encomenda
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
