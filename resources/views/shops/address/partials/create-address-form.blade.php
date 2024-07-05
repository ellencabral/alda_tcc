<x-slot name="heading">
    Adicionar Endereço
</x-slot>

<x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('shops.address.create') }}
</x-slot>

<x-form-address :action="route('artisan.shops.address.update')"
                :address="false" :update="true" />
