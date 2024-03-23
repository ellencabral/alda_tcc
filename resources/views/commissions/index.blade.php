<x-layout title="Commissions">
    <ul class="list-group">
        @foreach($commissions as $commission)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Descrição: {{ $commission->description }}
            </li>
            <ul>
                @foreach($commission->products as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </ul>

        @endforeach
    </ul>
</x-layout>
