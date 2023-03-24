<x-guest-layout>

    @push('head')
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/atom-one-dark.min.css">
    @endpush

    @push('foot')
        <script src="//unpkg.com/@highlightjs/cdn-assets@11.7.0/highlight.min.js"></script>
        <script>
            hljs.highlightAll();
            document.querySelectorAll('img').forEach(el => {
                const src = el.getAttribute('src');
                if (src?.includes('data:image/gif')) {
                    el.remove();
                    console.warn("REMOVED 'image/gif' BASE64 IMG TAGs")
                }
            })
        </script>
    @endpush

    <div id="main" x-data="global()" x-init="themeInit()" class="tw-container">
        @include('posts.partials.navbar')

        @include('posts.partials.responsive-nav')

        <div>
            <div class="container mx-auto">
                <div class="pb-16 lg:pb-20">

                    <x-breadcrumbs home="/blog" />


                    <article aria-label="Posts section" class="pt-8 lg:pt-12">
                        <div class="pb-8 border-b border-grey-lighter">
                            <h1 class="flex flex-col items-center justify-center gap-4 text-center md:flex-row">
                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="block text-2xl font-semibold transition-colors md:text-3xl font-body text-primary hover:text-green dark:text-white dark:hover:text-secondary">
                                    {{ $post->title }}
                                </a>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('blog.edit', $post->slug) }}" class="text-yellow-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    <x-alpine-modal :showCloseButton="true">
                                        <x-slot name="trigger">
                                            <a role="button" class="text-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </a>
                                        </x-slot>

                                        <x-slot name="content">
                                            <div>
                                                <h1 class="text-4xl font-semibold leading-tight">Confirm Action</h1>
                                                <p>Delete current post ? (This action is irreversible)</p>
                                                <form method="POST" action="{{ route('blog.destroy', $post->slug) }}"
                                                    class="flex items-center gap-2 justify-center my-4">
                                                    @csrf
                                                    @method('delete')
                                                    <x-secondary-button @click.prevent="showModal = false">Cancel!
                                                    </x-secondary-button>
                                                    <x-button>Yes</x-button>
                                                </form>
                                            </div>
                                        </x-slot>
                                    </x-alpine-modal>
                                </div>

                            </h1>

                            <p class="text-sm font-light text-center">Posted by: {{ $post->user->name }}</p>
                            <div class="flex items-center justify-center pt-4 text-gray-500">
                                <p class="pr-2 font-light font-body"
                                    x-text="new Date('{{ $post->created_at }}').toLocaleDateString()"></p>
                                <span class="font-body text-grey ">//</span>
                                <p class="pl-2 font-light font-body">
                                    {{ $post->reading_time }}
                                </p>
                            </div>

                            <div
                                class="mx-auto my-6 prose prose-img:rounded-xl prose-headings:underline prose-a:text-blue-600 lg:prose-lg dark:prose-invert text-start">
                                {!! $post->getBody() !!}
                            </div>
                            <div class="flex flex-wrap items-center justify-center gap-2">
                                @foreach ($post->categories as $cat)
                                    <span
                                        class="inline-block px-2 py-1 my-4 text-sm capitalize rounded-full text-yellow-dark bg-yellow-light font-body">{{ $cat->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>


        <div class="flex flex-col md:flex-row">
            @foreach ($siblings as $post)
                @if ($loop->iteration === 1)
                    <article class="w-full max-w-full p-4 border border-gray-500 rounded-l-md md:w-1/2">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <p class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                                </svg>
                                Previous Post
                            </p>
                            <p class="mt-2 font-semibold line-clamp-1">{{ $post->title }}</p>
                        </a>
                    </article>
                @else
                    <article class="w-full max-w-full p-4 text-right border border-gray-500 rounded-r-md md:w-1/2 ">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <p class="flex flex-row-reverse items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                                Next Post
                            </p>
                            <p class="mt-2 font-semibold line-clamp-1">{{ $post->title }}</p>
                        </a>
                    </article>
                @endif
            @endforeach
        </div>

        <section aria-label="Comment Section" class="py-8">
            <p class="font-semibold text-lg leading-tight text-gray-500">
                Post comment is currently not available.
            </p>
        </section>


        <form class="flex flex-col gap-2 py-12 sm:flex-row">
            <p class="py-2 font-light font-body text-primary dark:text-white">
                Don't miss out! Stay up-to-date with our latest news and offers by subscribing to our newsletter today.
            </p>
            <x-input type="email" required placeholder="Enter your email here..."
                class="max-w-full px-4 py-4 sm:w-1/2 sm:py-2" />
            <x-button>SUBSCRIBE</x-button>
        </form>
    </div>

</x-guest-layout>
<x-ui-footer />
