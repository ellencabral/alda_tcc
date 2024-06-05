@unless ($breadcrumbs->isEmpty())
    <ol class="flex flex-wrap text-sm mt-4">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="flex items-center">
                    <a href="{{ $breadcrumb->url }}" class="text-gray-600 hover:underline focus:underline">
                        {{ $breadcrumb->title }}
                    </a>
                </li>
            @else
                <li class="flex items-center text-secondary-300 font-extrabold">
                    {{ $breadcrumb->title }}
                </li>
            @endif

            @unless($loop->last)
                <i class="text-gray-600 p-2 fa-solid fa-angle-right"></i>
            @endif

        @endforeach
    </ol>
@endunless
