<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Informações da Loja
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Atualize as informações da sua loja.
        </p>
    </header>

    <form method="POST" action="{{ route('artisan.shop.update', $shop->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $shop->name)" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>

            <x-input-label for="url" :value="'Url da loja'" />
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                www.site.com/urldaloja
            </p>
            <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url', $shop->url)" required autofocus autocomplete="url" />
            <x-input-error :messages="$errors->get('url')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
