<x-dashboard-layout>
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('shops.edit') }}
    </x-slot>

    <x-slot name="heading">
        Configurações da Loja
    </x-slot>

    <section class="grid gap-4">
        <span class="w-full h-40 bg-gray-200">
            <!-- Imagem -->
        </span>

        <div class="flex items-center gap-2">
            <span class="w-16 h-16 bg-gray-200 rounded-full">
                <!-- Imagem -->
            </span>
            <div class="flex flex-col">
                <h2 class="font-extrabold">
                    {{ Auth::user()->shop->name }}
                </h2>
                <p class="uppercase text-xs text-gray-400">
                    site.com.br/<span class="font-bold text-secondary-300">{{ Auth::user()->shop->url }}</span>
                </p>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <x-link :color="'primary'" class="py-4" href="{{ route('artisan.shops.information.edit') }}">
                Informações
            </x-link>
            <i class="fa-solid fa-pen text-gray-400"></i>
        </div>

        <hr/>
        <div class="flex justify-between items-center">
            <x-link :color="'primary'" class="py-4" href="{{ route('artisan.shops.customization.edit') }}">
                Personalização
            </x-link>
            <i class="fa-solid fa-pen text-gray-400"></i>
        </div>

        <hr/>
        <div class="flex justify-between items-center">
            <x-link :color="'primary'" class="py-4" href="{{ route('artisan.shops.address.edit') }}">
                Endereço
            </x-link>
            <i class="fa-solid fa-pen text-gray-400"></i>
        </div>

        @include('shops.partials.delete-shop-form')

    </section>

</x-dashboard-layout>
