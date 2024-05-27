
@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'text-sm font-extrabold flex items-center bg-secondary-500 text-white px-2 rounded hover:bg-secondary-400 transition duration-150 ease-in-out'
                : 'text-sm font-extrabold flex items-center bg-secondary-300 px-2 rounded hover:bg-secondary-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
