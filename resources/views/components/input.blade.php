@props(['disabled' => false, 'element' => 'input'])

@if ($element === 'textarea')
    <textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' =>
            'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-rose-500 dark:focus:border-rose-600 focus:ring-rose-500 dark:focus:ring-rose-600 rounded-md shadow-sm',
        'cols' => 30,
        'rows' => 10,
    ]) !!}>{{ $value ?? '' }}</textarea>
@else
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' =>
            'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-rose-500 dark:focus:border-rose-600 focus:ring-rose-500 dark:focus:ring-rose-600 rounded-md shadow-sm',
    ]) !!}>
@endif
