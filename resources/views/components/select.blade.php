<select
    {{ $attributes->merge(['class' => 'focus:border-rose-500 dark:focus:border-rose-600 focus:ring-rose-500 dark:focus:ring-rose-600 rounded-md shadow-sm border-gray-300 dark:border-gray-700']) }}>
    @if (isset($label))
        <option disabled {{ request($name) ? '' : 'selected' }}>{{ $label }}</option>
    @endif
    {{ $slot }}
</select>
