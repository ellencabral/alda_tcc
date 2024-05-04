<x-mail::message>
# Olá, {{ $commission->user->name }}!
Sua encomenda para a loja "{{ $commission->shop->name }}" acaba de ser atualizada.

<x-mail::panel>
    Status: {{ $commission->status->description }}
</x-mail::panel>

<x-mail::button :url="route('commissions.show', $commission->id)">
    Ver mais detalhes
</x-mail::button>

</x-mail::message>
