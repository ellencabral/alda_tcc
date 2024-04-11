<x-layout title="Editar Usuário '{!! $user->name !!}'">
    <x-users.form :action="route('admin.users.update', $user->id)"
                  :name="$user->name"
                  :email="$user->email"
                  :phone="$user->phone"
                  :update="true"
                  :button="'Salvar'"/>
</x-layout>
