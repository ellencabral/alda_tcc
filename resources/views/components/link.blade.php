@props(['color' => 'secondary'])

@php
    $class = ($color == 'secondary')
                ? 'text-secondary-300 underline hover:text-secondary-700 transition ease-in-out duration-150'
                : 'text-primary-700 underline hover:text-primary-900 transition ease-in-out duration-150'
    ;
@endphp

<a {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</a>
