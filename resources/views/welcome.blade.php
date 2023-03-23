<x-guest-layout>

    @push('head')
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    @endpush

    <x-ui-navbar />

    <main>

        {{-- Hero Section --}}
        <section
            class="relative bg-[url(https://images.unsplash.com/photo-1604014237800-1c9102c219da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80)] bg-cover bg-center bg-no-repeat h-[50vh] overflow-hidden">
            <div
                class="absolute inset-0 bg-gray-800/50 sm:bg-transparent sm:bg-gradient-to-r sm:from-white/95 dark:sm:from-gray-800/95 sm:to-white/25">
            </div>

            <div class="relative max-w-screen-xl px-4 py-6 mx-auto md:py-14 sm:px-6 lg:flex lg:items-center lg:px-8">
                <div class="max-w-xl text-center sm:text-left">
                    <h1 class="text-3xl font-extrabold sm:text-5xl">
                        Discover Your Next

                        <strong class="block font-extrabold text-rose-700">
                            Favorite Thing.
                        </strong>
                    </h1>

                    <p class="max-w-lg mt-4 sm:text-xl sm:leading-relaxed">
                        Shop our wide range of products and find exactly what you need with our easy-to-use online
                        store.
                    </p>

                    <div class="flex flex-wrap gap-4 mt-8 text-center">
                        <button
                            class="block w-full px-12 py-3 text-sm font-medium text-white rounded shadow bg-rose-600 hover:bg-rose-700 active:bg-rose-500 sm:w-auto">
                            Get Started
                        </button>

                        <a href="#products" role="button"
                            class="block w-full px-12 py-3 text-sm font-medium bg-white rounded shadow text-rose-600 hover:text-rose-700 active:text-rose-500 sm:w-auto">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Recommendation Section 1 --}}
        <section>
            <div class="max-w-screen-xl px-4 py-10 mx-auto sm:px-6 sm:py-20 lg:px-8">
                <header class="text-center">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-gray-50 sm:text-3xl">
                        New Collection
                    </h2>

                    <p class="max-w-md mx-auto mt-4 text-gray-500">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque
                        praesentium cumque iure dicta incidunt est ipsam, officia dolor fugit
                        natus?
                    </p>
                </header>

                <ul class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-3">
                    <li>
                        <a href="#" class="relative block duration-500 group hover:saturate-150" role="button"
                            draggable="false">
                            <img src="https://images.unsplash.com/photo-1618898909019-010e4e234c55?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80"
                                alt=""
                                class="object-cover w-full transition duration-500 aspect-square group-hover:opacity-90" />

                            <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
                                <h3 class="text-xl font-medium text-white">Casual Trainers</h3>

                                <span
                                    class="mt-1.5 inline-block bg-black px-5 py-3 text-xs font-medium uppercase tracking-wide text-white">
                                    Shop Now
                                </span>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="relative block duration-500 group hover:saturate-150" role="button"
                            draggable="false">
                            <img src="https://images.unsplash.com/photo-1624623278313-a930126a11c3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80"
                                alt=""
                                class="object-cover w-full transition duration-500 aspect-square group-hover:opacity-90" />

                            <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
                                <h3 class="text-xl font-medium text-white">Winter Jumpers</h3>

                                <span
                                    class="mt-1.5 inline-block bg-black px-5 py-3 text-xs font-medium uppercase tracking-wide text-white">
                                    Shop Now
                                </span>
                            </div>
                        </a>
                    </li>

                    <li class="lg:col-span-2 lg:col-start-2 lg:row-span-2 lg:row-start-1">
                        <a href="#" class="relative block duration-500 group hover:saturate-150" role="button"
                            draggable="false">
                            <img src="https://images.unsplash.com/photo-1593795899768-947c4929449d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2672&q=80"
                                alt=""
                                class="object-cover w-full transition duration-500 aspect-square group-hover:opacity-90" />

                            <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
                                <h3 class="text-xl font-medium text-white">Skinny Jeans Blue</h3>

                                <span
                                    class="mt-1.5 inline-block bg-black px-5 py-3 text-xs font-medium uppercase tracking-wide text-white">
                                    Shop Now
                                </span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        {{-- Recommendation Section 2 --}}

        <section id="products">
            <div class="max-w-screen-xl px-4 py-10 mx-auto sm:px-6 sm:py-20 lg:px-8">
                <header class="text-center">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-gray-50 sm:text-3xl">
                        Product Collection
                    </h2>

                    <p class="max-w-md mx-auto mt-4 text-gray-500">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque
                        praesentium cumque iure dicta incidunt est ipsam, officia dolor fugit
                        natus?
                    </p>
                </header>

                <ul class="grid gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-4">
                    <li>
                        <a href="javascript:void(0)" class="block group">
                            <div class="overflow-hidden ">
                                <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                                    alt=""
                                    class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-110 sm:h-[450px]" />
                            </div>

                            <div class="relative pt-3">
                                <h3
                                    class="text-xs text-gray-700 dark:text-gray-300 group-hover:underline group-hover:underline-offset-4">
                                    Basic Tee
                                </h3>

                                <p class="mt-2">
                                    <span class="sr-only"> Regular Price </span>

                                    <span class="tracking-wider text-gray-900 dark:text-gray-50"> £24.00 GBP </span>
                                </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="block group">
                            <div class="overflow-hidden ">
                                <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                                    alt=""
                                    class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-110 sm:h-[450px]" />
                            </div>

                            <div class="relative pt-3">
                                <h3
                                    class="text-xs text-gray-700 dark:text-gray-300 group-hover:underline group-hover:underline-offset-4">
                                    Basic Tee
                                </h3>

                                <p class="mt-2">
                                    <span class="sr-only"> Regular Price </span>

                                    <span class="tracking-wider text-gray-900 dark:text-gray-50"> £24.00 GBP </span>
                                </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="block group">
                            <div class="overflow-hidden ">
                                <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                                    alt=""
                                    class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-110 sm:h-[450px]" />
                            </div>

                            <div class="relative pt-3">
                                <h3
                                    class="text-xs text-gray-700 dark:text-gray-300 group-hover:underline group-hover:underline-offset-4">
                                    Basic Tee
                                </h3>

                                <p class="mt-2">
                                    <span class="sr-only"> Regular Price </span>

                                    <span class="tracking-wider text-gray-900 dark:text-gray-50"> £24.00 GBP </span>
                                </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="block group">
                            <div class="overflow-hidden ">
                                <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                                    alt=""
                                    class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-110 sm:h-[450px]" />
                            </div>

                            <div class="relative pt-3">
                                <h3
                                    class="text-xs text-gray-700 dark:text-gray-300 group-hover:underline group-hover:underline-offset-4">
                                    Basic Tee
                                </h3>

                                <p class="mt-2">
                                    <span class="sr-only"> Regular Price </span>

                                    <span class="tracking-wider text-gray-900 dark:text-gray-50"> £24.00 GBP </span>
                                </p>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </section>

        {{-- Customer Reviews --}}

        <section>
            <div class="max-w-screen-xl px-4 py-10 mx-auto sm:px-6 lg:px-8">

                <header class="text-center">
                    <h2 class="text-xl font-bold text-gray-900 capitalize dark:text-gray-50 sm:text-3xl">
                        Not interested yet ?
                    </h2>

                    <p class="max-w-md mx-auto mt-4 text-gray-500">
                        Check out others review about our products
                    </p>
                </header>

                <h2 class="mt-8 text-xl font-bold sm:text-2xl">Customer Reviews</h2>

                <div class="flex items-center gap-4 mt-4">
                    <p class="text-3xl font-medium">
                        4.5
                        <span class="sr-only"> Average review score </span>
                    </p>

                    <div>
                        <div class="flex">
                            <x-star-svg />
                            <x-star-svg />
                            <x-star-svg />
                            <x-star-svg />
                            <x-empty-star-svg />
                        </div>

                        <p class="mt-0.5 text-xs text-gray-500">Based on 48 reviews</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 mt-8 gap-x-16 gap-y-12 lg:grid-cols-2">
                    <blockquote>
                        <header class="sm:flex sm:items-center sm:gap-4">
                            <div class="flex">
                                <x-star-svg />
                                <x-star-svg />
                                <x-star-svg />
                                <x-star-svg />
                                <x-empty-star-svg />
                            </div>

                            <p class="mt-2 font-medium sm:mt-0">The best thing money can buy!</p>
                        </header>

                        <p class="mt-2 text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam
                            possimus fuga dolor rerum dicta, ipsum laboriosam est totam iusto
                            alias incidunt cum tempore aliquid aliquam error quisquam ipsam
                            asperiores! Iste?
                        </p>

                        <footer class="mt-4">
                            <p class="text-xs text-gray-500">John Doe - 12th January, 2024</p>
                        </footer>
                    </blockquote>

                    <blockquote>
                        <header class="sm:flex sm:items-center sm:gap-4">
                            <div class="flex">
                                <x-star-svg />
                                <x-star-svg />
                                <x-star-svg />
                                <x-star-svg />
                                <x-empty-star-svg />
                            </div>

                            <p class="mt-2 font-medium sm:mt-0">The best thing money can buy!</p>
                        </header>

                        <p class="mt-2 text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam
                            possimus fuga dolor rerum dicta, ipsum laboriosam est totam iusto
                            alias incidunt cum tempore aliquid aliquam error quisquam ipsam
                            asperiores! Iste?
                        </p>

                        <footer class="mt-4">
                            <p class="text-xs text-gray-500">John Doe - 12th January, 2024</p>
                        </footer>
                    </blockquote>

                    <blockquote>
                        <header class="sm:flex sm:items-center sm:gap-4">
                            <div class="flex">
                                <x-star-svg />
                                <x-star-svg />
                                <x-star-svg />
                                <x-star-svg />
                                <x-empty-star-svg />
                            </div>

                            <p class="mt-2 font-medium sm:mt-0">The best thing money can buy!</p>
                        </header>

                        <p class="mt-2 text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam
                            possimus fuga dolor rerum dicta, ipsum laboriosam est totam iusto
                            alias incidunt cum tempore aliquid aliquam error quisquam ipsam
                            asperiores! Iste?
                        </p>

                        <footer class="mt-4">
                            <p class="text-xs text-gray-500">John Doe - 12th January, 2024</p>
                        </footer>
                    </blockquote>

                    <blockquote>
                        <header class="sm:flex sm:items-center sm:gap-4">
                            <div class="flex">
                                <x-star-svg />
                                <x-star-svg />
                                <x-star-svg />
                                <x-star-svg />
                                <x-empty-star-svg />
                            </div>

                            <p class="mt-2 font-medium sm:mt-0">The best thing money can buy!</p>
                        </header>

                        <p class="mt-2 text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam
                            possimus fuga dolor rerum dicta, ipsum laboriosam est totam iusto
                            alias incidunt cum tempore aliquid aliquam error quisquam ipsam
                            asperiores! Iste?
                        </p>

                        <footer class="mt-4">
                            <p class="text-xs text-gray-500">John Doe - 12th January, 2024</p>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </section>


        <x-ui-footer />

    </main>



</x-guest-layout>
