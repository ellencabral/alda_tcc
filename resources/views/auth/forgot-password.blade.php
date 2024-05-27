<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.navigation.guest')
    </x-slot>

    <x-slot name="heading">
        Recuperar Senha
    </x-slot>
    <form class="grid gap-8" method="POST" action="{{ route('password.email') }}">
        @csrf

        <p class="text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </p>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                          class="w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full">
                Enviar
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
