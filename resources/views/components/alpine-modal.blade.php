@props(['showCloseButton' => false])

<div x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
    <div role="button" @click="showModal = !showModal">
        {{ $trigger }}
    </div>

    <div x-cloak x-show="showModal" x-transition.opacity class="fixed inset-0 bg-black/50 dark:bg-black/75"></div>

    <div x-cloak x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center">
        <div @click.away="showModal = false"
            {{ $attributes->merge(['class' => 'w-fit max-w-xl mx-4 md:mx-auto bg-gray-50 dark:bg-gray-800 rounded-lg container flex items-center flex-col justify-center relative ' . ($showCloseButton ? 'px-8 py-10' : 'p-8')]) }}>
            {{ $content }}
            @if ($showCloseButton)
                <div class="close-button absolute top-4 right-4">
                    <a role="button" @click.prevent="showModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
