@props(['type' => 'success', 'static' => false])

@php

switch($type) {
    case 'success':
        $classes = 'w-full absolute p-4 rounded font-medium text-sm bg-green-400';
        break;
    case 'warning':
        $classes = 'w-full absolute p-4 rounded font-medium text-sm bg-yellow-400';
        break;
    case 'danger':
        $classes = 'w-full absolute p-4 rounded font-medium text-sm bg-red-400';
        break;
}

@endphp

@if($static)
    <p x-data="{ show: true }"
       x-show="show"
       x-transition
        {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </p>
@else
    <p x-data="{ show: true }"
       x-show="show"
       x-transition
       x-init="setTimeout(() => show = false, 2000)"
        {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </p>
@endif
