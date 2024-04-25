<form method="post" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden"
           name="shop_id"
           value="{{ $product->shop_id }}" />

    <input type="hidden"
           name="id"
           value="{{ $product->id }}" />

    <input type="hidden"
           name="name"
           value="{{ $product->name }}" />

    <input type="hidden"
           name="sale_price"
           value="{{ $product->sale_price }}" />

    <input type="hidden"
           name="image"
           value="{{ $product->image }}" />

    @isset($quantity)
        <x-input-label for="quantity"
                       :value="'Quantidade:'" />
        <x-text-input type="number"
                      id="quantity"
                      name="quantity"
                      value="1"
                      required />
    @else
        <x-text-input type="hidden"
                      name="quantity"
                      value="1" />
    @endisset

    <x-primary-button>
        Comprar
    </x-primary-button>
</form>
