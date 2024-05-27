@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center pt-1 border-b-2 border-primary-900 font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'flex items-center pt-1 border-b-2 text-sm hover:text-gray-600 border-transparent hover:border-primary-900 focus:outline-none focus:text-gray-600 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
