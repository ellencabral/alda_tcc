<x-admin-layout>
    @isset($message)
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endisset
    <div class="py-12 w-full">
        <div class="p-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-primary-button>
                <a href="{{ route('admin.users.create') }}">Registrar usuário</a>
            </x-primary-button>
            @foreach($users as $user)
                <ul class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" p-6 text-gray-900 dark:text-gray-100">
                        <li class="flex justify-between align-items-center gap-x-6">
                            <div class="align-middle min-w-0 gap-x-4">
                                    <p class="font-semibold leading-6">{{ $user->name }}</p>
                                    <p class="mt-1 truncate text-xs leading-5">{{ $user->email }}</p>
                            </div>
                            <x-secondary-button>
                                <a href="{{ route('admin.users.edit', $user->id) }}">Editar</a>
                            </x-secondary-button>
                        </li>
                    </div>
                </ul>
            @endforeach
        </div>
    </div>
</x-admin-layout>

