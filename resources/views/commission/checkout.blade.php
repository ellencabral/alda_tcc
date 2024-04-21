<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Resumo da Encomenda
        </h2>
    </x-slot>
    <form method="post" action="{{ route('commission.store') }}">
        <input type="hidden" />
        <x-primary-button>
            Finalizar Encomenda
        </x-primary-button>
    </form>
</x-app-layout>
