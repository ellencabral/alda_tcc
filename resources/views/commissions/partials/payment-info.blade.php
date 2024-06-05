<section id="payment-info" class="grid gap-4">
    <header class="flex items-center gap-2">
        <i class="fa-solid fa-money-check-dollar"></i>
        <h3 class="text-xl font-bold">
            Forma de Pagamento
        </h3>
    </header>
    @if($commission->payment == 'credit')
        <p>Vou pagar com cartão de crédito.</p>
    @else
        <p>Vou pagar com PIX.</p>
    @endif
</section>
