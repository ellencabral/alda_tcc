@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center text-sm border-b-2 font-medium border-primary-900 hover:text-gray-700 transition duration-150 ease-in-out'
            : 'flex items-center text-sm border-b-2 hover:text-gray-700 border-transparent hover:border-primary-900 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
