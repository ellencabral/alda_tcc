<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.navigation.guest')
    </x-slot>

    <x-slot name="heading">
        Modificar Senha
    </x-slot>
    <form class="grid gap-8" method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="'E-mail'" />
            <x-text-input id="email"
                          class="w-full"
                          type="email"
                          name="email"
                          :value="old('email', $request->email)"
                          required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                          class="w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password"
                          placeholder="Digite a sua nova senha" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation"
                          class="w-full"
                          type="password"
                          name="password_confirmation"
                          required autocomplete="new-password"
                          placeholder="Digite a sua nova senha novamente" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full">
            Salvar
        </x-primary-button>
    </form>
</x-app-layout>
