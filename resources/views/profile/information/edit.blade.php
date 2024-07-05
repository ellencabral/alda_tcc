<x-app-layout>
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('profile.information.edit') }}
    </x-slot>

    <x-slot name="heading">
        Dados Pessoais
    </x-slot>

{{--    <form id="send-verification" method="post" action="{{ route('verification.send') }}">--}}
{{--        @csrf--}}
{{--    </form>--}}

    <form class="grid gap-8"
          method="post"
          action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <p class="text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>

        <div>
            <x-input-label for="name" value="Nome" />
            <x-text-input id="name"
                          name="name"
                          type="text"
                          class="w-full"
                          :value="old('name', $user->name)"
                          placeholder="Digite o seu nome completo"
                          required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email"
                          name="email"
                          type="email"
                          class="w-full"
                          :value="old('email', $user->email)"
                          placeholder="Digite o seu endereço de e-mail"
                          required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if(session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="w-full">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>

</x-app-layout>
