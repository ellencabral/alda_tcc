<section class="grid gap-4">
    <header class="flex justify-between">
        <div class="flex items-center gap-2">
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
        </div>
        <p class="text-gray-400">
            Feita em {{ date('d/m/Y', strtotime($commission->created_at)) }}
        </p>
    </header>
    <hr/>
</section>
