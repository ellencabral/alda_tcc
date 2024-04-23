<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Forma de Pagamento
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Escolha uma forma de pagamento para esta encomenda.
        </p>
    </header>

    <div x-data="{ payment: 'credit_card' }" >
        <div class="flex items-center">
            <x-text-input type="radio"
                          id="credit_card"
                          name="payment"
                          value="credit_card"
                          x-model="payment"
                          checked />
            <x-input-label for="credit_card"
                           class="ml-2"
                           :value="'Cartão de crédito'"/>
        </div>
        <div class="flex items-center">
            <x-text-input type="radio"
                          id="pix"
                          name="payment"
                          value="pix"
                          x-model="payment" />
            <x-input-label for="pix"
                           class="ml-2"
                           :value="'PIX'"/>
        </div>

        <div x-show="payment == 'credit_card'">
            Campos de cartão de crédito
        </div>

        <div x-show="payment == 'pix'">
            Informação de PIX
        </div>
    </div>
</section>
