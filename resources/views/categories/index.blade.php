<x-app-layout>
    <x-slot name="heading">
        Categorias de Artesanato
    </x-slot>

    @foreach($categories as $category)
        <li class="mt-2 mr-2">
            <a class="flex justify-center w-full text-gray-300 bg-gray-700 rounded-lg p-2" href="{{ route('categories.products.index', $category->id) }}">
                {{ $category->description }}
            </a>
        </li>
    @endforeach
</x-app-layout>
