<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Categorias de Artesanato
        </h2>
    </x-slot>
    <div class="py-12 w-full">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section>
                <ul class="grid grid-cols-2 sm:grid-cols-5 gap-4 text-gray-500 p-4 sm:mr-4 overflow-hidden dark:bg-gray-800 sm:rounded-lg">
                    @foreach($categories as $category)
                        <li class="mt-2 mr-2">
                            <a class="flex justify-center w-full text-gray-300 bg-gray-700 rounded-lg p-2" href="{{ route('categories.products.index', $category->id) }}">
                                {{ $category->description }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
        </div>
    </div>
</x-app-layout>
