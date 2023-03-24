<x-guest-layout>
    @push('head')
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    @endpush

    <div id="main" class="tw-container">
        @include('posts.partials.navbar')

        @include('posts.partials.responsive-nav')


        <div>
            <div class="container mx-auto">
                <div class="py-16 lg:py-20">
                    <div class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        <a href="{{ route('blog.create') }}" role="button"
                            class="text-rose-600/90 chip bg-rose-600/20">New</a>
                    </div>

                    <h1
                        class="pt-5 text-4xl font-semibold font-body text-primary dark:text-white md:text-5xl lg:text-6xl">
                        Blog
                    </h1>

                    <div class="pt-3 sm:w-3/4">
                        <p class="text-xl font-light font-body text-primary dark:text-white">
                            Articles, tutorials, snippets, rants, and everything else. Subscribe for
                            updates as they happen.
                        </p>
                    </div>

                    <form>
                        <div class="flex flex-col items-center gap-2 pt-3 sm:flex-row relative" x-data="{ onSearch: $refs.searchInput.value }"
                            x-init="(() => {
                                window.onkeydown = ({ key, ctrlKey }) => {
                                    if (ctrlKey && key === '/') $refs.searchInput.focus();
                                    else if (key === 'Escape') $refs.searchInput.blur();
                                }
                            })()">
                            <x-input autocomplete="off" name="search" type="search" class="w-full px-4 py-3" autofocus
                                @focus="val = $el.value; $el.value = ''; $el.value = val"
                                value="{{ request('search') }}" x-ref="searchInput" @input="onSearch = $el.value" />
                            <x-secondary-button class="flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                                Search
                            </x-secondary-button>

                            <span x-show="!onSearch" @click="$refs.searchInput.focus()"
                                class="absolute my-auto md:mt-auto mt-3 left-5 text-gray-500 bg-transparent flex items-center gap-4 pointer-events-none">
                                Search <div>
                                    <kbd>CTRL</kbd> + <kbd>/</kbd>
                                </div>
                            </span>
                        </div>

                        <div x-data="{ expanded: false }">
                            <span role="button" @click="expanded = ! expanded"
                                class="chip font-semibold text-rose-600 bg-rose-600/10 mt-2 flex items-center w-fit">
                                <i class='bx bx-slider-alt'></i>
                                @php
                                    $filtersCount = 0;
                                    if (request('categories')) {
                                        $filtersCount++;
                                    }
                                    if (request('sortBy')) {
                                        $filtersCount++;
                                    }
                                @endphp
                                Filter {{ $filtersCount ? "($filtersCount)" : '' }}
                            </span>

                            <div x-show="expanded" x-collapse
                                class="grid grid-cols-1 md:grid-cols-2 items-center gap-2">
                                <div>
                                    <x-alpine-multi-select elementId="categories" placeholder="Select Categories"
                                        elementName="categories" :optionsData="$categories->map(
                                            fn($cat) => ['key' => $cat->slug, 'value' => $cat->name],
                                        )" :selected="request('categories')" />
                                </div>

                                <div>
                                    <x-select label="Sort By" class="w-full" name="sortBy">
                                        <option value="latest" {{ request('sortBy') == 'latest' ? 'selected' : '' }}>
                                            Latest</option>
                                        <option value="oldest" {{ request('sortBy') == 'oldest' ? 'selected' : '' }}>
                                            Oldest</option>
                                        <option value="a-z" {{ request('sortBy') == 'a-z' ? 'selected' : '' }}>A-Z
                                        </option>
                                        <option value="z-a" {{ request('sortBy') == 'z-a' ? 'selected' : '' }}>Z-A
                                        </option>
                                    </x-select>
                                </div>

                                <div class="flex gap-4">
                                    <x-button>Apply Filters</x-button>
                                    <a role="button" href="{{ route('blog.index') }}"
                                        class="flex items-center w-fit">Clear Filters</a>
                                </div>

                            </div>
                        </div>
                    </form>
                    <section aria-label="Posts section" class="pt-8 lg:pt-12">
                        <div class="py-2">
                            <x-breadcrumbs home="/blog" />
                            @if (request('banner'))
                                <x-banner />
                            @endif
                        </div>
                        @forelse ($posts as $post)
                            <article class="py-8 border-b border-grey-lighter">
                                @forelse ($post->categories as $cat)
                                    <span
                                        class="inline-block px-2 py-1 mb-4 text-sm capitalize rounded-full text-yellow-dark bg-yellow-light font-body">{{ $cat->name }}</span>
                                @empty
                                    <span
                                        class="inline-block px-2 py-1 mb-4 text-sm capitalize rounded-full text-yellow-dark bg-yellow-light font-body">
                                        @production
                                            Uncategorized!
                                        @else
                                            No Category
                                        @endproduction
                                    </span>
                                @endforelse
                                <h4>
                                    <a href="{{ route('blog.show', $post->slug) }}"
                                        class="block text-lg font-semibold transition-colors font-body text-primary hover:text-green dark:text-white dark:hover:text-secondary">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <p class="text-gray-600 dark:text-gray-400">
                                    {{ $post->getExcerpt(30, true) }}
                                </p>
                                <div class="flex items-center pt-4 text-gray-500">
                                    <p class="pr-2 font-light font-body"
                                        x-text="new Date('{{ $post->created_at }}').toLocaleDateString()"></p>
                                    <span class="font-body text-grey ">//</span>
                                    <p class="pl-2 font-light font-body">
                                        {{ $post->reading_time }}
                                    </p>
                                </div>
                            </article>
                        @empty
                            <div>
                                <p class="text-lg text-gray-500">No posts to show.</p><a href="/"
                                    class="text-sm transition hover:text-rose-700">Back to home</a>
                            </div>
                        @endforelse
                    </section>

                    {{ $posts->links('layouts.pagination') }}
                </div>
            </div>
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
