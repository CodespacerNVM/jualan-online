<x-guest-layout>

    @push('head')
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    @endpush

    <div id="main" x-data="global()" x-init="themeInit()" class="tw-container">
        @include('posts.partials.navbar')

        @include('posts.partials.responsive-nav')

        <div>
            <div class="container mx-auto">
                <div class="pb-16 lg:pb-20">

                    <x-breadcrumbs home="/blog" />

                    <article aria-label="Posts section" class="pt-8 text-center lg:pt-12">
                        <div class="pb-8 border-b border-grey-lighter">
                            <h1>
                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="block text-2xl font-semibold transition-colors md:text-3xl font-body text-primary hover:text-green dark:text-white dark:hover:text-secondary">
                                    {{ $post->title }}
                                </a>
                            </h1>

                            <p class="text-sm font-light">Posted by: {{ $post->user->name }}</p>
                            <div class="flex items-center justify-center pt-4 text-gray-500">
                                <p class="pr-2 font-light font-body"
                                    x-text="new Date('{{ $post->created_at }}').toLocaleDateString()"></p>
                                <span class="font-body text-grey ">//</span>
                                <p class="pl-2 font-light font-body">
                                    {{ $post->reading_time }}
                                </p>
                            </div>

                            <div class="mx-auto my-6 prose text-gray-800 prose-slate dark:prose-invert dark:text-white">
                                <h1>hello world</h1>
                                {!! nl2br(e($post->body)) !!}
                            </div>
                            <span
                                class="inline-block px-2 py-1 my-4 text-sm capitalize rounded-full text-yellow-dark bg-yellow-light font-body">category</span>
                        </div>
                    </article>
                </div>
            </div>
        </div>


        <div class="flex flex-col md:flex-row">
            @foreach ($siblings as $post)
                @if ($loop->iteration === $siblings->count())
                    <article class="w-full max-w-full p-4 text-right border border-gray-500 md:w-1/2 ">
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
                @else
                    <article class="w-full max-w-full p-4 border border-gray-500 md:w-1/2">
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
                @endif
            @endforeach
        </div>


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
