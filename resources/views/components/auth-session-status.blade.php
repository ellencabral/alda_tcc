@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-green-500']) }}>
        {{ $status }}
    </div>
@endif
