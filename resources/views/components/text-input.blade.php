@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' => 'pl-0 pb-4 border-x-0 border-t-0 focus:text-primary-700 border-gray-200 focus:border-primary-700 focus:outline-none focus:ring-0 border-b-2'
    ]) !!}>
