<x-artisan-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('shop.commissions.show', $commission->id) }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-end">
                <x-secondary-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-commission-update')"
                >Alterar Status</x-secondary-button>

                <x-modal name="confirm-commission-update" focusable>
                    <form method="post" action="{{ route('artisan.commissions.update', $commission->id) }}" class="p-6">
                        @csrf
                        @method('patch')

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Alterar Status da Encomenda
                        </h2>

                        <x-input-label for="statuses" :value="'Status'"/>
                        <x-select-input id="statuses"
                                        name="status_id"
                                        class="block mt-1 w-full">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}" @if($commission->status->id == $status->id) selected @endif>
                                    {{ $status->description }}
                                </option>
                            @endforeach
                        </x-select-input>

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ms-3">
                                {{ __('Save') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>
            </div>

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

        </div>
    </div>
</x-artisan-layout>
