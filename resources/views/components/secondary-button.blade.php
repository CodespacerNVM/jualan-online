<button
    {{ $attributes->merge(['class' => 'block w-full px-12 py-3 text-sm font-medium bg-white rounded shadow text-rose-600 hover:text-rose-700 active:text-rose-500 sm:w-auto']) }}>
    {{ $slot }}
</button>
