<x-guest-layout>

    <x-ui-navbar fixed />

    <section class="bg-white dark:bg-gray-800">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <section class="relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
                <img alt="Night"
                    src="https://images.unsplash.com/photo-1617195737496-bc30194e3a19?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                    class="absolute inset-0 h-full w-full object-cover opacity-80" />

                <div class="hidden lg:relative lg:block lg:p-12">
                    <a class="block text-white" href="/">
                        <span class="sr-only">Home</span>
                        <x-application-mark class="absolute inset-0 h-full w-full object-cover opacity-80" />
                    </a>

                    <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                        Let's get connected!
                    </h2>

                    <p class="mt-4 leading-relaxed text-white/90">
                        Our customer service team is here to assist you with any questions or concerns you may have.
                        Contact us today for friendly and knowledgeable support that goes above and beyond to ensure
                        your satisfaction.
                    </p>
                </div>
            </section>

            <main aria-label="Main"
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:py-12 lg:px-16 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">
                    <div class="relative -mt-16 block lg:hidden">
                        <a class="inline-flex h-16 w-16 items-center justify-center rounded-full bg-white text-blue-600 sm:h-20 sm:w-20"
                            href="/">
                            <span class="sr-only">Home</span>
                            <div>
                                <x-application-mark class="h-8 sm:h-10" />
                            </div>
                        </a>

                        <h1 class="mt-2 text-2xl font-bold text-gray-900 dark:text-gray-50 sm:text-3xl md:text-4xl">
                            Let's get connected!
                        </h1>

                        <p class="mt-4 leading-relaxed text-gray-500">
                            Our customer service team is here to assist you with any questions or concerns you may have.
                        </p>
                    </div>

                    <form action="#" class="mt-8 grid grid-cols-6 gap-6">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="full-name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Full Name
                            </label>

                            <input type="text" id="full-name" name="full_name"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 dark:text-gray-400 shadow-sm" />
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label for="Email" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Email
                            </label>

                            <input type="email" id="Email" name="email"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 dark:text-gray-400 shadow-sm" />
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Message
                            </label>

                            <textarea id="message" name="message"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 dark:text-gray-400 shadow-sm"></textarea>
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <x-button>Send</x-button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>

    <script>
        const textarea = document.querySelector('textarea')

        textarea.oninput = function() {
            textarea.style.height = ""; /* Reset the height*/
            textarea.style.height = Math.min(textarea.scrollHeight, 500) + "px";
        };
    </script>

</x-guest-layout>
