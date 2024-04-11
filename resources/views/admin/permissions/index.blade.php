<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex justify-between p-6 text-gray-900 dark:text-gray-100">
                    Permissões
                    <x-primary-button>
                        <a href="{{ route('admin.permissions.create') }}">{{ __('Create') }} Permissão</a>
                    </x-primary-button>
                </div>
                <table class="p-6 min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">{{ __('Edit') }}</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($permissions as $permission)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $permission->name }}</td>
                                <td>{{ __('Edit') }}</td>
                                <td>{{ __('Delete') }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
