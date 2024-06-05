@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' => 'focus:ring-primary-700 checked:bg-primary-700 checked:focus:bg-primary-700'
    ]) !!}>
