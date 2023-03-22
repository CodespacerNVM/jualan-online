<nav class="container mx-auto">
    <div class="flex items-center justify-between py-6 lg:py-10">
        <a href="/" class="flex items-center">
            <span href="/" class="mr-2">
                <x-application-logo />
            </span>
        </a>
        <div class="flex items-center lg:hidden">
            <i class="mr-8 text-3xl transition-all duration-1000 cursor-pointer bx text-primary dark:text-white"
                @click="themeSwitch()" :class="isDarkMode ? 'bxs-sun' : 'bxs-moon'" no-highlight></i>

            <svg width="24" height="15" xmlns="http://www.w3.org/2000/svg" @click="isMobileMenuOpen = true"
                class="fill-current text-primary dark:text-white">
                <g fill-rule="evenodd">
                    <rect width="24" height="3" rx="1.5" />
                    <rect x="8" y="6" width="16" height="3" rx="1.5" />
                    <rect x="4" y="16" width="20" height="3" rx="1.5" />
                </g>
            </svg>
        </div>
        <div class="hidden lg:block">
            <ul class="flex items-center">

                <li class="relative mb-1 mr-6 group">
                    <a href="{{ route('home') }}"
                        class="block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current font-semibold hover:text-red-700">
                        Home
                    </a>
                </li>


                <li class="relative mb-1 mr-6 group">
                    <a href="{{ route('blog.index') }}"
                        class="block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current font-semibold hover:text-red-700">
                        Blog
                    </a>

                </li>
                <li class="relative mb-1 mr-6 group">
                    <a href="{{ route('about.show') }}"
                        class="block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current font-semibold hover:text-red-700">
                        About
                    </a>
                </li>

                <li class="relative mb-1 mr-6 group">
                    <a href="javascript:void(0)"
                        class="block h-16 border-b-4 border-transparent leading-[4rem] hover:border-current font-semibold hover:text-red-700">
                        Search
                    </a>
                </li>

                <li>
                    <i class="text-3xl transition-all duration-1000 cursor-pointer bx text-primary dark:text-white "
                        @click="themeSwitch()" :class="isDarkMode ? 'bxs-sun' : 'bxs-moon'"></i>
                </li>
            </ul>
        </div>
    </div>
</nav>
