<x-layout title="Novo Usuário">
    <x-users.form :action="route('admin.users.store')"
                  :update="false"
                  :button="'Registrar'"/>
</x-layout>
