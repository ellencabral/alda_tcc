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
            <section class="sm:flex sm:flex-row-reverse mt-6">
                <div class="w-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4 sm:mb-0">
                    <div class="p-4 text-gray-900 dark:text-gray-100">
                        Bem-vindo, {{ Auth::user()->name }}
                    </div>
                </div>
                <ul class="flex flex-wrap sm:flex-col text-gray-500 p-4 sm:mr-4 overflow-hidden dark:bg-gray-800 sm:rounded-lg">
                    @foreach($categories as $category)
                        <li class="mt-2">
                            <x-nav-link href="{{ route('categories.products.index', $category->id) }}">
                                {{ $category->description }}
                            </x-nav-link>
                        </li>
                    @endforeach
                </ul>
            </section>

        </div>
    </div>
</x-app-layout>
