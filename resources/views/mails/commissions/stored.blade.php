<x-mail::message>
@if($type == 'user')
# Olá, {{ $commission->user->name }}!
Você acaba de fazer uma encomenda para a loja "{{ $commission->shop->name }}".
@elseif($type == 'shop')
# Olá, {{ $commission->shop->user->name }}!
Você acaba de receber uma encomenda na sua loja "{{ $commission->shop->name }}".
@endif

<x-mail::table>
| Produto       | Quantidade         | Preço  |
| ------------- |:-------------:| --------:|
@foreach($commission->commissionProducts()->get() as $commissionProduct)
| {{ $commissionProduct->product->name }}      | {{ $commissionProduct->quantity }}x      | R$ {{ number_format($commissionProduct->sale_price, 2, ',', '.') }}      |
@endforeach
</x-mail::table>

<x-mail::panel>
Total: R$ {{ number_format($commissionProduct->sale_price, 2, ',', '.') }}
</x-mail::panel>

<x-mail::button :url="$type == 'user' ? route('commissions.show', $commission->id) : route('artisan.commissions.show', $commission->id)">
    Ver mais detalhes
</x-mail::button>

</x-mail::message>


