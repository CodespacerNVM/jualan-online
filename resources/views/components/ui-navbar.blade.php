<header aria-label="Site Header"
    class="sticky top-0 z-10 border-b border-gray-200 shadow dark:border-gray-100 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm">
    <div class="flex items-center justify-between h-16 mx-auto max-w-screen-2xl sm:px-6 lg:px-8" x-data="{ showDropdown: false }">
        <div class="relative flex items-center gap-4">

            <x-dropdown class="dropdown" align="left">
                <x-slot name="trigger">
                    <button type="button" class="p-2 lg:hidden">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <p class="sr-only">Hamburger Menu</p>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <nav aria-label="Site Nav" class="flex flex-col gap-2 px-4 py-2 font-bold text-gray-400 uppercase">

                        <a href="/products"
                            class="transition duration-300 border-b-4 border-transparent hover:border-current hover:text-red-700">
                            Products
                        </a>

                        <a href="{{ route('contact.show') }}"
                            class="transition duration-300 border-b-4 border-transparent hover:border-current hover:text-red-700">
                            Contact
                        </a>

                        <a href="{{ route('about.show') }}"
                            class="transition duration-300 border-b-4 border-transparent hover:border-current hover:text-red-700">
                            About
                        </a>

                        <a href="{{ route('blog.index') }}"
                            class="transition duration-300 border-b-4 border-transparent hover:border-current hover:text-red-700">
                            Blog
                        </a>
                    </nav>
                </x-slot>
            </x-dropdown>

            <a role="button" href="{{ route('home') }}" class="flex select-none" draggable="false">
                <x-application-logo class="block w-auto h-8" />
            </a>
        </div>

        <div class="flex items-center justify-end flex-1 gap-8">
            <nav aria-label="Site Nav"
                class="hidden lg:flex lg:gap-4 lg:text-xs lg:font-bold lg:uppercase lg:tracking-wide lg:text-gray-500">
                <a href="{{ route('about.show') }}"
                    class="block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current transition duration-300 hover:text-red-700">
                    About
                </a>

                <a href="/products"
                    class="block h-16 border-b-4 {{ request()->routeIs('contact.show') ? 'border-current text-red-700' : 'border-transparent' }} leading-[4rem] hover:border-current transition duration-300 hover:text-red-700">
                    Products
                </a>

                <a href="{{ route('contact.show') }}"
                    class="block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current transition duration-300 hover:text-red-700">
                    Contact
                </a>

                <a href="{{ route('blog.index') }}"
                    class="block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current transition duration-300 hover:text-red-700">
                    Blog
                </a>
            </nav>

            <div class="flex items-center">
                <div class="flex items-center border-gray-100 divide-x divide-gray-100 border-x">
                    <span>
                        <a href="/cart"
                            class="block p-6 transition duration-300 border-b-4 border-transparent hover:border-red-700 focus:border-red-700">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>

                            <span class="sr-only">Cart</span>
                        </a>
                    </span>

                    <x-dropdown class="dropdown-account">
                        <x-slot name="trigger">
                            <span>
                                <a href="{{ Auth::check() ? 'javascript:void(0)' : route('login') }}"
                                    class="block p-6 transition duration-300 border-b-4 border-transparent hover:border-red-700 focus:border-red-700">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>

                                    <span class="sr-only"> Account </span>
                                </a>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <nav aria-label="Main Nav" class="flex flex-col p-2 space-y-1">
                                <a @click="themeSwitch()" role="button"
                                    class="flex items-center gap-2 px-4 py-2 text-gray-700 bg-gray-100 rounded-lg dark:text-gray-50 dark:bg-gray-800">
                                    <i class="text-xl transition-all duration-1000 cursor-pointer bx text-primary dark:text-white "
                                        :class="isDarkMode ? 'bxs-sun' : 'bxs-moon'"></i>

                                    <span class="text-sm font-medium"> Theme </span>
                                </a>

                                <a href="" role="button"
                                    class="flex items-center gap-2 px-4 py-2 text-gray-500 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-50 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>

                                    <span class="text-sm font-medium"> Billing </span>
                                </a>

                                <a href="" role="button"
                                    class="flex items-center gap-2 px-4 py-2 text-gray-500 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-50 hover:text-gray-700">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>

                                        <span class="text-sm font-medium"> Invoices </span>
                                    </div>

                                    <span
                                        class="shrink-0 rounded-full ml-auto bg-gray-100 dark:text-black py-0.5 px-3 text-xs text-gray-600 group-hover:bg-gray-200 group-hover:text-gray-700">
                                        3
                                    </span>
                                </a>

                                <a href="{{ route('profile.show') }}" role="button"
                                    class="flex items-center gap-2 px-4 py-2 text-gray-500 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-50 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-75" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>

                                    <span class="text-sm font-medium"> Account </span>
                                </a>
                            </nav>

                        </x-slot>
                    </x-dropdown>

                    <span class="hidden sm:block">
                        <a href="/search"
                            class="block p-6 transition duration-300 border-b-4 border-transparent hover:border-red-700 focus:border-red-700">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
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
