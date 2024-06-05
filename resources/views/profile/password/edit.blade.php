<x-app-layout>
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('profile.password.edit') }}
    </x-slot>

    <x-slot name="heading">
        Editar Senha
    </x-slot>

    <p class="text-sm text-gray-600">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </p>

    <form class="grid gap-8" method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password"
                          name="current_password"
                          type="password"
                          class="w-full"
                          placeholder="Digite a sua senha atual"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password"
                          name="password"
                          type="password"
                          class="w-full"
                          placeholder="Digite a sua nova senha"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation"
                          name="password_confirmation"
                          type="password"
                          class="w-full"
                          placeholder="Digite a sua senha novamente"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="w-full">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</x-app-layout>
