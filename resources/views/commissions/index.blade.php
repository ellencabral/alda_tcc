<x-layout title="Commissions">
    <ul class="list-group">
        @foreach($commissions as $commission)
            <li class="list-group-item">
                Descrição: {{ $commission->description }}
            </li>
            <ul class="list-group-item">Produtos:
                @foreach($commission->products as $product)
                    <li class="list-group-item">{{ $product->name }}</li>
                @endforeach
            </ul>

        @endforeach
    </ul>
</x-layout>
