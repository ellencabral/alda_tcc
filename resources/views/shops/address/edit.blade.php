<x-dashboard-layout>
    @if($shop->street)
        @include('shops.address.partials.update-address-form')

        @include('shops.address.partials.delete-address-form')
    @else
        @include('shops.address.partials.create-address-form')
    @endif
</x-dashboard-layout>
