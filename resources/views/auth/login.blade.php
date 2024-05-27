<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.navigation.guest')
    </x-slot>

    <x-slot name="heading">
        Fazer Login
    </x-slot>

    <form class="grid gap-8" method="POST" action="{{ route('login') }}">
        @csrf


        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                          class="w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required autofocus autocomplete="username"
                          placeholder="Digite o seu e-mail" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                          class="w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password"
                          placeholder="Digite a sua senha" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            @if (Route::has('password.request'))
                <a class="mt-4 underline flex justify-end text-secondary-300 hover:text-secondary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-700"
                   href="{{ route('password.request') }}">
                    Esqueci minha senha
                </a>
            @endif
        </div>

        <!-- Remember Me -->
        <div>
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me"
                       type="checkbox"
                       class="rounded border-gray-600 focus:ring-primary-700"
                       name="remember">
                <span class="ml-2 text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <x-primary-button class="w-full">
            {{ __('Log in') }}
        </x-primary-button>

        <a class="underline text-center text-lg text-secondary-300 hover:text-secondary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-700"
           href="">
            Criar uma conta
        </a>
    </form>
</x-app-layout>
