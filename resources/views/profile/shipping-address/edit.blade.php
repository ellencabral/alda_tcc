<x-app-layout>
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('shipping-address.edit', $address) }}
    </x-slot>
    <x-slot name="heading">
        Atualizar Endereço
    </x-slot>

    <x-form-address :action="route('shipping-address.update', $address->id)"
                    :address="$address" :update="true" :checkbox="true" />

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-shipping-address-deletion')">
        Deletar Endereço
    </x-danger-button>

    <x-modal name="confirm-shipping-address-deletion" :show="$errors->shippingAddressDeletion->isNotEmpty()" focusable>
        <form class="p-8" method="post" action="{{ route('shipping-address.destroy', $address->id) }}">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-extrabold">
                Deseja deletar este endereço?
            </h2>

            <div class="mt-6 flex justify-between">
                <button class="uppercase text-xs border border-gray-400 px-4 rounded-lg font-extrabold text-gray-400" x-on:click="$dispatch('close')">
                    Não, cancelar
                </button>

                <x-danger-button>
                    Sim, deletar
                </x-danger-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>
