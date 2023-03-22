@php
    $fullPath = request()->path();
    $links = $fullPath === '/' ? [] : explode('/', $fullPath);
@endphp

<ul class="flex flex-wrap max-w-full space-x-3 overflow-x-hidden" aria-label="breadcrumbs">
    <li class="flex items-center space-x-3">
        <a href="{{ $home ?? 'javascript:void(0)' }}" class="text-gray-800 dark:text-gray-50">Home</a>
    </li>
    @forelse ($links as $link)
        <li class="flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
            <span class="text-gray-500">{{ str($link)->limit(20, '...') }}</span>
        </li>
    @empty
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
    @endforelse

</ul>
