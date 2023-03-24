@props(['autoClose' => false, 'timeout' => '5000', 'showCloseButton' => false, 'variant' => 'warning'])

@php
    $variants = [
        'success' => 'border-green-400 text-green-700 bg-green-100',
        'danger' => 'border-red-400 text-red-700 bg-red-100',
        'warning' => 'border-yellow-400 text-yellow-700 bg-yellow-100',
        'info' => 'border-sky-400 text-sky-700 bg-sky-100',
    ];
@endphp

<div x-cloak x-show="showAlert" x-data="{ showAlert: true }"
    @if ($autoClose) x-init="setTimeout(() => showAlert = false, {{ $timeout }})" @endif
    role="alert" class="alert">
    <div class="border {{ $variants[$variant] }} px-4 py-3 rounded relative" role="alert">
        @if (isset($title))
            <strong class="font-bold">{{ $title }}</strong>
        @endif
        <span class="block sm:inline">{{ $slot }}</span>
        @if ($showCloseButton || $autoClose)
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="showAlert = false">
                <svg class="fill-current h-6 w-6 text-slate-700" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        @endif
    </div>
</div>
