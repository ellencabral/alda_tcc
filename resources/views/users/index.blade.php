<x-layout title="Usuários">
    <a href="{{ route('users.create')  }}" class="btn btn-dark mb-2">Registrar</a>

    <ul class="list-group">
        @foreach($users as $user)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $user->name }}
            </li>
        @endforeach
    </ul>
</x-layout>

