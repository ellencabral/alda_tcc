<x-admin-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('users.create') }}
    </x-slot>
    <x-users.form :action="route('admin.users.store')"
                  :update="false"
                  :button="'Registrar'"/>
</x-admin-layout>
