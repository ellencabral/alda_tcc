<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Forma de Pagamento
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Escolha uma forma de pagamento para esta encomenda.
        </p>
    </header>

    <div x-data="{ payment: 'pix' }" >
        <div class="mt-2 flex items-center">
            <x-text-input type="radio"
                          id="pix"
                          name="payment"
                          value="pix"
                          x-model="payment"
                          checked />
            <x-input-label for="pix"
                           class="ml-2"
                           :value="'PIX'" />
        </div>
        <div class="mt-2 flex items-center">
            <x-text-input type="radio"
                          id="credit_card"
                          name="payment"
                          value="credit"
                          x-model="payment" />
            <x-input-label for="credit_card"
                           class="ml-2"
                           :value="'Cartão de crédito'"/>
        </div>

        <div x-show="payment == 'credit_card'">
            <h2 class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Campos de cartão de crédito
            </h2>
        </div>

        <div x-show="payment == 'pix'">
            <h2 class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Informação de PIX
            </h2>
        </div>
    </div>
</section>
