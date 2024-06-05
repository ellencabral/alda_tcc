<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center p-4 bg-secondary-300 justify-center rounded-lg font-semibold text-xs uppercase shadow-md tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
