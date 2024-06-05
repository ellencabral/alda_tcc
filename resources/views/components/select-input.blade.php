<select {!! $attributes->merge(['class' => 'w-full cursor-pointer border border-gray-400 text-gray-900 text-sm rounded-xl p-2 focus:border-primary-700 focus:ring-primary-700']) !!}>
    {{ $slot }}
</select>
