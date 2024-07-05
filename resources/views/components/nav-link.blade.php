@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center text-sm pb-1 border-b-2 font-medium border-primary-900 transition duration-150 ease-in-out'
            : 'flex items-center text-sm pb-1 border-b-2 border-transparent hover:border-primary-900 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
