<x-app-layout>
    <div class="py-12">
        @can('activate shop')
            <div class="mx-8">
                <p class="p-6 bg-yellow-700 rounded border-5 font-medium text-sm dark:text-gray-300">
                    <a class="underline hover:text-amber-900" href="{{ route('shop.activate') }}">Ative sua loja</a> para poder acessar o Painel de Controle do Artesão.
                </p>
            </div>
        @endcan
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-form-search />

            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Bem-vindo, {{ Auth::user()->name }}
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
