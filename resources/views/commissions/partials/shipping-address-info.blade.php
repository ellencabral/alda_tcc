<section id="shipping-address-info" class="grid gap-4">
    <header class="flex items-center gap-2">
        <i class="fa-solid fa-truck-fast"></i>
        <h3 class="text-xl font-bold">
            Endereço de Entrega
        </h3>
    </header>

    <div class="border border-gray-300 p-4 rounded-lg">
        <table class="text-left">
            <tr>
                <th class="w-24">Rua</th>
                <td>{{ $commission->shippingAddress->street }}</td>
            </tr>
            <tr>
                <th>Número</th>
                <td>{{ $commission->shippingAddress->number }}</td>
            </tr>
            @isset($commission->shippinAddress->complement)
                <tr>
                    <th>Complemento</th>
                    <td>{{ $commission->shippingAddress->complement }}</td>
                </tr>
            @endisset
            <tr>
                <th>Bairro</th>
                <td>{{ $commission->shippingAddress->locality }}</td>
            </tr>
            <tr>
                <th>Cidade</th>
                <td>{{ $commission->shippingAddress->city }}</td>
            </tr>
            <tr>
                <th>Estado</th>
                <td>{{ $commission->shippingAddress->region_code }}</td>
            </tr>
            <tr>
                <th>CEP</th>
                <td>{{ $commission->shippingAddress->postal_code }}</td>
            </tr>
        </table>
    </div>
</section>
