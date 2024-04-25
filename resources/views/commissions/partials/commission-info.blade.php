<section>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Encomenda para a loja
        <a href="/shop/{{ $commission->shop->url }}">
            {{ $commission->shop->name }}
        </a>
    </h2>
    <p class="@if($commission->status->id > 1 and $commission->status->id < 6)
                                   text-yellow-300
                              @else
                                   text-green-500
                              @endif ">
        {{ $commission->status->description }}
    </p>
    <p class="text-gray-200">
        Data: {{ date('d/m/Y', strtotime($commission->created_at)) }}
    </p>
    <p class="text-gray-200">
        Última atualização: {{ date('d/m/Y', strtotime($commission->updated_at)) }}
    </p>
</section>
