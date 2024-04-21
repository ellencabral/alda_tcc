<form method="post" action="{{ $action }}">
    @csrf
    <div class="mt-6 space-y-6">
        <div class="mt-2">
            <x-input-label for="postal_code" :value="'CEP'" />
            <x-text-input class="mt-1 block w-full"
                          id="postal_code"
                          name="postal_code"
                          type="number"
                          :value="old('postal_code', $address->postal_code ?? '')"
                          required autofocus autocomplete="postal_code" />
            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
        </div>

        <div class="flex mt-2">
            <div class="w-full">
                <x-input-label for="street" :value="'Rua'" />
                <x-text-input class="mt-1 block w-full"
                              id="street"
                              name="street"
                              type="text"
                              :value="old('street', $address->street ?? '')"
                              required autofocus autocomplete="street" />
                <x-input-error class="mt-2" :messages="$errors->get('street')" />
            </div>

            <div class="ml-4">
                <x-input-label for="number" :value="'Número'" />
                <x-text-input class="mt-1 block w-full"
                              id="number"
                              name="number"
                              type="number"
                              :value="old('number', $address->number ?? '')"
                              required autofocus autocomplete="number" />
                <x-input-error class="mt-2" :messages="$errors->get('number')" />
            </div>
        </div>

        <div class="mt-2">
            <x-input-label for="complement" :value="'Complemento'" />
            <x-text-input class="mt-1 block w-full"
                          id="complement"
                          name="complement"
                          type="text"
                          :value="old('complement', $address->complement ?? '')"
                          required autofocus autocomplete="complement" />
            <x-input-error class="mt-2" :messages="$errors->get('complement')" />
        </div>

        <div class="mt-2">
            <x-input-label for="locality" :value="'Bairro'" />
            <x-text-input class="mt-1 block w-full"
                          id="locality"
                          name="locality"
                          type="text"
                          :value="old('locality', $address->locality ?? '')"
                          required autofocus autocomplete="locality" />
            <x-input-error class="mt-2" :messages="$errors->get('locality')" />
        </div>

        <div class="mt-2">
            <x-input-label for="city" :value="'Cidade'" />
            <x-text-input class="mt-1 block w-full"
                          id="city"
                          name="city"
                          type="text"
                          :value="old('city', $address->city ?? '')"
                          required autofocus autocomplete="city" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <div class="mt-2">
            <x-input-label for="region_code" :value="'Estado'" />
            <x-text-input class="mt-1 block w-full"
                          id="region_code"
                          name="region_code"
                          type="text"
                          :value="old('region_code', $address->region_code ?? '')"
                          required autofocus autocomplete="region_code" />
            <x-input-error class="mt-2" :messages="$errors->get('region_code')" />
        </div>
    </div>

    @isset($address)
        @method('patch')
        <div class="flex items-center">
            <input type="checkbox"
                          id="is_default"
                          name="is_default"
                          value="1"
                          {{ $address->is_default ? 'checked' : '' }} >
            <x-input-label for="is_default"
                           class="ml-2"
                           :value="'Este é meu endereço padrão'"/>
        </div>
    @endisset

    <x-primary-button>
        Salvar
    </x-primary-button>
</form>
