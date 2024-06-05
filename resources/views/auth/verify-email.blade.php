<x-app-layout>
    <x-slot name="heading">
        Verificar E-mail
    </x-slot>

    <div class="grid gap-4">
        <div class="mb-4 text-gray-600">
            Enviamos um e-mail de verificação. Se não o recebeu, é só solicitar outro.
        </div>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="w-full">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form class="flex justify-center" method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="underline text-lg text-secondary-300 hover:text-secondary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-700">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-app-layout>
