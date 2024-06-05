<x-app-layout>
    <x-slot name="heading">
        Minha Conta
    </x-slot>

    <section class="grid gap-4">
        <div class="flex">
            <span class="w-16 h-16 bg-gray-200 rounded-full">

            </span>
            <div class="flex flex-col justify-center ml-4">
                <h2 class="font-extrabold">
                    Ellen Morales Cabral da Silva
                </h2>
                <p class="uppercase text-xs">
                    {{ Auth::user()->email }}
                </p>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <x-link class="py-8" href="{{ route('profile.information.edit') }}">
                Dados Pessoais
            </x-link>
            <i class="fa-solid fa-pen-to-square text-gray-400"></i>
        </div>
        <hr/>
        <div class="flex justify-between items-center">
            <x-link class="py-8" href="{{ route('profile.shipping-address.index') }}">
                Endereços de Entrega
            </x-link>
            <i class="fa-solid fa-pen-to-square text-gray-400"></i>
        </div>
        <hr/>
        <div class="flex justify-between items-center">
            <x-link class="py-8" href="{{ route('profile.password.edit') }}">
                Editar Senha
            </x-link>
            <i class="fa-solid fa-pen-to-square text-gray-400"></i>
        </div>

        @include('profile.partials.delete-user-form')
    </section>
</x-app-layout>
