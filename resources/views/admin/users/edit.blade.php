<x-admin-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('users.edit', $user->name) }}
    </x-slot>
    <x-users.form :action="route('admin.users.update', $user->id)"
                  :name="$user->name"
                  :email="$user->email"
                  :phone="$user->phone"
                  :update="true"
                  :button="'Salvar'"/>
</x-admin-layout>
