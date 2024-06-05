@props(['background' => 'secondary'])

@php
    $class = ($background == 'primary')
                ? 'bg-primary-700 shadow-md text-xs font-semibold flex items-center justify-center p-3 rounded-lg hover:bg-primary-800 transition duration-150 ease-in-out'
                : 'bg-secondary-300 shadow-md text-xs font-semibold flex items-center justify-center p-3 rounded-lg hover:bg-secondary-400 transition duration-150 ease-in-out'
    ;
@endphp

<a {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</a>
