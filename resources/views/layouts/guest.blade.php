<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="favicon.svg" type="image/svg+xml" media="(prefers-color-scheme: light)">
    <link rel="shortcut icon" href="favicon-dark.svg" type="image/svg+xml" media="(prefers-color-scheme: dark)">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js"
        integrity="sha512-HaoDYc3PGduguBWOSToNc0AWGHBi2Y432Ssp3wNIdlOzrunCtB2qq6FrhtPbo+PlbvRbyi86dr5VQx61eg/daQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>

<body>
    <div class="font-sans antialiased text-gray-900 transition duration-300 dark:text-gray-100" id="container">
        {{ $slot }}
    </div>


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
    @stack('foot')
</body>

</html>
