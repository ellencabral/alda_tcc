<form method="post" action="{{ $action }}">
    @csrf

    @isset($update)
        @method('patch')
    @endisset

    <livewire:inputs-address :address="$address" />

    @isset($checkbox)
        <div class="flex items-center">
            <input type="checkbox"
                   id="is_default"
                   name="is_default"
                   value="1"
                {{ $address->is_default ? 'checked' : '' }} >
            <x-input-label for="is_default"
                           class="ml-2"
                           :value="'Este é meu endereço padrão'" />
        </div>
    @endisset

    <x-primary-button class="mt-4">
        Salvar
    </x-primary-button>
</form>
