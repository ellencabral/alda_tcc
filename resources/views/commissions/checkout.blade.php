<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Finalizar Encomenda
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="post" action="{{ route('commissions.store') }}">
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

                <div class="flex justify-end">
                    @if($addresses->isEmpty())
                        <x-primary-button class="mt-6" :disabled="true">
                            Finalizar Encomenda
                        </x-primary-button>
                    @else
                        <x-primary-button class="mt-6" :disabled="false">
                            Finalizar Encomenda
                        </x-primary-button>
                    @endif
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
