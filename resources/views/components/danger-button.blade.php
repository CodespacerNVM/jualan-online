<button
    {{ $attributes->merge(['class' => 'block w-full px-12 py-3 text-sm font-medium text-rose-50 font-semibold uppercase rounded shadow bg-rose-700 hover:bg-rose-700 active:bg-rose-600 sm:w-auto']) }}>
    {{ $slot }}
</button>
