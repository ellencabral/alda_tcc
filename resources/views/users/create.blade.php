<x-layout title="Novo Usuário">
    <x-users.form :action="route('users.store')"
                  :update="false"
                  :button="'Registrar'"/>
</x-layout>
