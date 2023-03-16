<button
    {{ $attributes->merge(['class' => 'block w-full px-12 py-3 text-sm font-medium text-white rounded shadow bg-rose-600 hover:bg-rose-700 active:bg-rose-500 sm:w-auto']) }}>
    {{ $slot }}
</button>
