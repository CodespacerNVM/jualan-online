<nav class="fixed inset-0 z-50 flex transition-opacity bg-black opacity-0 pointer-events-none bg-opacity-80 lg:hidden"
    :class="isMobileMenuOpen ? 'opacity-100 pointer-events-auto' : ''">
    <div class="w-2/3 p-4 ml-auto bg-green md:w-1/3">
        <i class="absolute top-0 right-0 mt-4 mr-4 text-4xl text-white bx bx-x" @click="isMobileMenuOpen = false"></i>
        <ul class="flex flex-col mt-8">

            <li class="relative mb-1 mr-6 group">
                <a href="{{ route('home') }}" class="block px-2 mb-3 text-lg font-medium text-white font-body">
                    Home
                </a>
            </li>


            <li class="relative mb-1 mr-6 group">
                <a href="{{ route('blog.index') }}" class="block px-2 mb-3 text-lg font-medium text-white font-body">
                    Blog
                </a>
            </li>

            <li class="relative mb-1 mr-6 group">
                <a href="{{ route('about.show') }}" class="block px-2 mb-3 text-lg font-medium text-white font-body">
                    About
                </a>
            </li>

            <li class="relative mb-1 mr-6 group">
                <a href="javascript:void(0)" class="block px-2 mb-3 text-lg font-medium text-white font-body">
                    Search
                </a>
            </li>

        </ul>
    </div>
</nav>
