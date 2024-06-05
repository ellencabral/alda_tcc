<x-app-layout>
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('shipping-address.create') }}
    </x-slot>
    <x-slot name="heading">
        Adicionar Endereço
    </x-slot>

    <x-form-address :action="route('shipping-address.store')"
                    :address="false" />
</x-app-layout>
