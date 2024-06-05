<x-app-layout>
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('commissions.show', $commission->id) }}
    </x-slot>
    <x-slot name="heading">
        Detalhes da Encomenda
        <i class="fa-solid fa-hashtag"></i>
        {{ $commission->id }}
    </x-slot>

    <section class="grid gap-8">
        @include('commissions.partials.commission-info')

        @include('commissions.partials.products-info')

        @include('commissions.partials.shipping-address-info')

        @include('commissions.partials.payment-info')

        <div>
            <h2 class="mb-4 flex justify-between font-bold text-2xl">
                Total:
                <span class="text-primary-700">
                    R$ {{ number_format($commission->total, 2, ',', '.') }}
                </span>
            </h2>

            <div class="flex justify-between">
                @include('commissions.partials.delete-commission')

                <x-primary-button>
                    Realizar Pagamento
                </x-primary-button>
            </div>
        </div>
    </section>
</x-app-layout>
