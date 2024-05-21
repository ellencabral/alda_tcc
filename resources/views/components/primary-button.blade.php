@props(['disabled' => false, 'type' => 'submit'])

@php
    $classes = ($disabled ?? false)
                ? 'flex justify-center p-3 rounded-xl font-semibold uppercase focus:outline-none focus:ring-0'
                : 'flex justify-center p-3 rounded-xl font-semibold uppercase focus:outline-primary-800 shadow-md bg-primary-700 hover:bg-primary-800 transition ease-in-out duration-150';
@endphp

@php
    switch ($type) {
        case 'button':
            $type = 'button';
            break;
    }
@endphp

<button {{ $attributes->merge(['type' => $type, 'class' => $classes]) }} {{ $disabled ? 'disabled' : '' }}>
    {{ $slot }}
</button>
