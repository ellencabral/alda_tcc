<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.navigation.guest')
    </x-slot>

    <x-slot name="heading">
        Verificar E-mail
    </x-slot>

    <div class="grid gap-4">
        <div class="mb-4 text-gray-600">
            Antes de começar, poderia verificar seu e-mail clicando no link que enviamos? Se não recebeu o e-mail, é só solicitar outro.
        </div>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="w-full">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        @if (session('status') == 'verification-link-sent')
            <div class="font-medium text-sm text-green-500">
                Um novo e-mail de verificação foi enviado para o e-mail que você inseriu no cadastro.
            </div>
        @endif

        <form class="flex justify-center" method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="underline text-lg text-secondary-300 hover:text-secondary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-700">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-app-layout>
