<x-guest-layout>

    @push('head')
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    @endpush

    @push('foot')
        <script>
            function global() {
                return {
                    isMobileMenuOpen: false,
                    isDarkMode: false,
                    themeInit() {
                        if (
                            localStorage.theme === "dark" ||
                            (!("theme" in localStorage) &&
                                window.matchMedia("(prefers-color-scheme: dark)").matches)
                        ) {
                            localStorage.theme = "dark";
                            document.documentElement.classList.add("dark");
                            this.isDarkMode = true;
                        } else {
                            localStorage.theme = "light";
                            document.documentElement.classList.remove("dark");
                            this.isDarkMode = false;
                        }
                    },
                    themeSwitch() {
                        if (localStorage.theme === "dark") {
                            localStorage.theme = "light";
                            document.documentElement.classList.remove("dark");
                            this.isDarkMode = false;
                        } else {
                            localStorage.theme = "dark";
                            document.documentElement.classList.add("dark");
                            this.isDarkMode = true;
                        }
                    },
                };
            }
        </script>
    @endpush

    <div id="main" x-data="global()" x-init="themeInit()" class="tw-container">
        @include('posts.partials.navbar')

        @include('posts.partials.responsive-nav')



        <div>
            <div class="container mx-auto">
                <div class="py-16 lg:py-20">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
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

                    <form class="flex flex-col items-center gap-2 pt-3 md:flex-row">
                        <x-input name="search" type="search" placeholder="Search..." class="w-full px-4 py-3" />
                        <x-secondary-button class="flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                            Search
                        </x-secondary-button>
                    </form>

                    <div class="pt-4">
                        <x-breadcrumbs home="/blog" />
                    </div>

                    <section aria-label="Posts section" class="pt-8 lg:pt-12">
                        @forelse ($posts as $post)
                            <article class="py-8 border-b border-grey-lighter">
                                <span
                                    class="inline-block px-2 py-1 mb-4 text-sm capitalize rounded-full text-yellow-dark bg-yellow-light font-body">category</span>
                                <h4>
                                    <a href="{{ route('blog.show', $post->slug) }}"
                                        class="block text-lg font-semibold transition-colors font-body text-primary hover:text-green dark:text-white dark:hover:text-secondary">
                                        {{ $post->title }}
                                    </a>
                                </h4>
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

                    <div class="flex pt-8 lg:pt-16">
                        <span
                            class="px-3 py-1 font-medium border-2 cursor-pointer border-secondary font-body text-secondary">1</span>
                        <span
                            class="px-3 py-1 ml-3 font-medium transition-colors border-2 cursor-pointer border-primary font-body text-primary hover:border-secondary hover:text-secondary dark:border-green-light dark:text-white dark:hover:border-secondary dark:hover:text-secondary">2</span>
                        <span
                            class="px-3 py-1 ml-3 font-medium transition-colors border-2 cursor-pointer border-primary font-body text-primary hover:border-secondary hover:text-secondary dark:border-green-light dark:text-white dark:hover:border-secondary dark:hover:text-secondary">3</span>
                        <span
                            class="flex items-center px-3 py-1 ml-3 font-medium transition-colors border-2 cursor-pointer group border-primary font-body text-primary hover:border-secondary hover:text-secondary dark:border-green-light dark:text-white dark:hover:border-secondary dark:hover:text-secondary">Next
                            <i
                                class="ml-1 transition-colors bx bx-right-arrow-alt text-primary group-hover:text-secondary dark:text-white"></i></span>
                    </div>
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
