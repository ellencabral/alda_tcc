<x-danger-button
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-commission-deletion')"
>Cancelar Encomenda</x-danger-button>

<x-modal name="confirm-commission-deletion" :show="$errors->commissionDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('commissions.destroy', $commission->id) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Tem certeza que quer cancelar essa encomenda?
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            A encomenda será excluída permanentemente.
        </p>

        <div class="mt-6">
            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="mt-1 block w-3/4"
                placeholder="{{ __('Password') }}"
            />

            <x-input-error :messages="$errors->commissionDeletion->get('password')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                Não, quero manter
            </x-secondary-button>

            <x-danger-button class="ms-3">
                Sim, quero cancelar
            </x-danger-button>
        </div>
    </form>
</x-modal>
