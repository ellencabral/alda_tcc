<div>
    <div class="mt-2">
        <x-input-label for="postal_code" :value="'CEP'" />
        <x-text-input class="mt-1 block w-full"
                      id="postal_code"
                      name="postal_code"
                      type="text"
                      :value="old('postal_code', $postal_code ?? '')"
                      required autofocus autocomplete="postal_code"
                      x-mask="99999 999" placeholder="99999-999"
                      wire:model.change="postal_code" />
        <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
    </div>

    <div class="flex mt-2">
        <div class="w-full">
            <x-input-label for="street" :value="'Rua'" />
            <x-text-input class="mt-1 block w-full"
                          id="street"
                          name="street"
                          type="text"
                          :value="old('street', $street ?? '')"
                          required autofocus autocomplete="street"
                          wire:model.live="street" />
            <x-input-error class="mt-2" :messages="$errors->get('street')" />
        </div>

        <div class="ml-4">
            <x-input-label for="number" :value="'Número'" />
            <x-text-input class="mt-1 block w-full"
                          id="number"
                          name="number"
                          type="number"
                          :value="old('number', $number ?? '')"
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
                      :value="old('complement', $complement ?? '')"
                      autofocus autocomplete="complement" />
        <x-input-error class="mt-2" :messages="$errors->get('complement')" />
    </div>

    <div class="mt-2">
        <x-input-label for="locality" :value="'Bairro'" />
        <x-text-input class="mt-1 block w-full"
                      id="locality"
                      name="locality"
                      type="text"
                      :value="old('locality', $locality ?? '')"
                      required autofocus autocomplete="locality"
                      wire:model.live="locality" />
        <x-input-error class="mt-2" :messages="$errors->get('locality')" />
    </div>

    <div class="mt-2">
        <x-input-label for="city" :value="'Cidade'" />
        <x-text-input class="mt-1 block w-full"
                      id="city"
                      name="city"
                      type="text"
                      :value="old('city', $city ?? '')"
                      required autofocus autocomplete="city"
                      wire:model.live="city" />
        <x-input-error class="mt-2" :messages="$errors->get('city')" />
    </div>

    <div class="mt-2">
        <x-input-label for="region_code" :value="'Estado'" />
        <x-text-input class="mt-1 block w-full"
                      id="region_code"
                      name="region_code"
                      type="text"
                      :value="old('region_code', $region_code ?? '')"
                      required autofocus autocomplete="region_code"
                      wire:model.live="region_code" />
        <x-input-error class="mt-2" :messages="$errors->get('region_code')" />
    </div>
</div>
