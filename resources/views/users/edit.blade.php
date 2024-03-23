<x-layout title="Editar Usuário '{!! $user->name !!}'">
    <x-users.form :action="route('users.update', $user->id)"
                  :name="$user->name"
                  :email="$user->email"
                  :password="$user->password"
                  :update="true"
                  :button="'Salvar'"/>
</x-layout>
