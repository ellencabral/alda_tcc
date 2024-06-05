<x-app-layout>
    <x-slot name="heading">
        Minhas Encomendas
    </x-slot>

    <section class="grid gap-8">
        @if($commissions->isEmpty())
            <span class="h-40 w-full bg-gray-200"></span>
            <p class="text-gray-600 text-sm">
                Nenhuma encomenda por aqui.
            </p>
            <hr/>
            <x-link href="{{ route('home') }}">
                Ir para a página inicial
            </x-link>
        @else
            @foreach($commissions as $commission)
                <div class="rounded-lg p-4 border border-gray-200 grid gap-4">
                    <div class="flex justify-between">
                        <p class="flex items-center gap-2 text-gray-400">
                            <i class="fa-solid fa-hashtag"></i>
                            {{ $commission->id }}
                        </p>
                        <div class="flex items-center">
                            <x-link :href="route('commissions.show', $commission->id)">
                                Ver detalhes
                            </x-link>
                            <i class="ml-2 fa-solid fa-chevron-right text-secondary-300"></i>
                        </div>
                    </div>
                    <hr/>
                    <table class="w-full text-left rtl:text-right">
                        <tr>
                            <th>Status</th>
                            <td class="flex items-center gap-2">
                                <div class="rounded-full h-3 w-3 @if($commission->status->id > 1 and $commission->status->id < 6)
                                          animate-pulse bg-yellow-400 text-yellow-400
                                      @else
                                          bg-green-400
                                      @endif "></div>
                                <p class="@if($commission->status->id > 1 and $commission->status->id < 6)
                                          text-yellow-500
                                      @else
                                          text-green-500
                                      @endif ">
                                    {{ $commission->status->description }}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th>Loja</th>
                            <td>{{ $commission->shop->name }}</td>
                        </tr>
                        <tr>
                            <th>Data</th>
                            <td>{{ date('d/m/Y', strtotime($commission->created_at)) }}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>R$ {{ number_format($commission->total, 2, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
            @endforeach
            @if($commissions->count() > 1)
                <hr/>
            @endif
        @endif
    </section>
</x-app-layout>
