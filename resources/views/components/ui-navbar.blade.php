<header aria-label="Site Header"
    class="sticky top-0 z-10 border-b border-gray-200 dark:border-gray-100 shadow bg-white/80 200:bg-gray-800/80 backdrop-blur-sm">
    <div class="flex items-center justify-between h-16 mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
        <div class="flex items-center gap-4">
            <button type="button" class="p-2 lg:hidden">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <p class="sr-only">Hamburger Menu</p>
            </button>

            <a href="{{ route('home') }}" class="flex select-none" draggable="false">
                <x-application-logo class="block w-auto h-8" />
            </a>
        </div>

        <div class="flex items-center justify-end flex-1 gap-8">
            <nav aria-label="Site Nav"
                class="hidden lg:flex lg:gap-4 lg:text-xs lg:font-bold lg:uppercase lg:tracking-wide lg:text-gray-500">
                <a href="/about"
                    class="block h-16 border-b-4 {{ request()->routeIs('contact.show') ? 'border-current text-red-700' : 'border-transparent' }} leading-[4rem] hover:border-current transition duration-300 hover:text-red-700">
                    About
                </a>

                <a href="/news"
                    class="block h-16 border-b-4 {{ request()->routeIs('contact.show') ? 'border-current text-red-700' : 'border-transparent' }} leading-[4rem] hover:border-current transition duration-300 hover:text-red-700">
                    News
                </a>

                <a href="/products"
                    class="block h-16 border-b-4 {{ request()->routeIs('contact.show') ? 'border-current text-red-700' : 'border-transparent' }} leading-[4rem] hover:border-current transition duration-300 hover:text-red-700">
                    Products
                </a>

                <a href="/contact-us"
                    class="block h-16 border-b-4 {{ request()->routeIs('contact.show') ? 'border-current text-red-700' : 'border-transparent' }} leading-[4rem] hover:border-current transition duration-300 hover:text-red-700">
                    Contact
                </a>
            </nav>

            <div class="flex items-center">
                <div class="flex items-center border-gray-200 dark:border-gray-100 divide-x divide-gray-200 dark:divide-gray-100 border-x">
                    <span>
                        <a href="/cart"
                            class="block p-6 transition duration-300 border-b-4 border-transparent hover:border-red-700">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>

                            <span class="sr-only">Cart</span>
                        </a>
                    </span>

                    <span>
                        <a href="{{ Auth::check() ? route('profile.show') : route('login') }}"
                            class="block p-6 transition duration-300 border-b-4 border-transparent hover:border-red-700">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>

                            <span class="sr-only"> Account </span>
                        </a>
                    </span>

                    <span class="hidden sm:block">
                        <a href="/search"
                            class="block p-6 transition duration-300 border-b-4 border-transparent hover:border-red-700">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>

                            <span class="sr-only"> Search </span>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
