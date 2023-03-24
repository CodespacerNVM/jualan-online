<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="/favicon.svg" type="image/svg+xml" media="(prefers-color-scheme: light)">
    <link rel="shortcut icon" href="/favicon-dark.svg" type="image/svg+xml" media="(prefers-color-scheme: dark)">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @props(['noSmoothScroll' => false])

    @if (!$noSmoothScroll)
        <script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js"
            integrity="sha512-HaoDYc3PGduguBWOSToNc0AWGHBi2Y432Ssp3wNIdlOzrunCtB2qq6FrhtPbo+PlbvRbyi86dr5VQx61eg/daQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endif

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>

<body>
    <x-banner />

    <div class="font-sans antialiased text-gray-900 transition duration-300 dark:text-gray-100" id="container"
        x-data="global()" x-init="themeInit()">
        {{ $slot }}
    </div>


    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("alpineMuliSelect", (obj) => ({
                elementId: obj.elementId,
                options: [],
                selected: obj.selected,
                selectedElms: [],
                show: false,
                search: '',
                open() {
                    this.show = true
                },
                close() {
                    this.show = false
                },
                toggle() {
                    this.show = !this.show
                },
                isOpen() {
                    return this.show === true
                },

                // Initializing component
                init() {
                    const options = document.getElementById(this.elementId).options;
                    for (let i = 0; i < options.length; i++) {

                        this.options.push({
                            value: options[i].value,
                            text: options[i].innerText,
                            search: options[i].dataset.search,
                            selected: Object.values(this.selected).includes(options[i].value)
                        });

                        if (this.options[i].selected) {
                            this.selectedElms.push(this.options[i])
                        }
                    }

                    // searching for the given value
                    this.$watch("search", (e => {
                        this.options = []
                        const options = document.getElementById(this.elementId).options;
                        Object.values(options).filter((el) => {
                            var reg = new RegExp(this.search, 'gi');
                            return el.dataset.search.match(reg)
                        }).forEach((el) => {
                            let newel = {
                                value: el.value,
                                text: el.innerText,
                                search: el.dataset.search,
                                selected: Object.values(this.selected).includes(
                                    el.value)
                            }
                            this.options.push(newel);
                        })
                    }));
                },
                // clear search field
                clear() {
                    this.search = ''
                },
                // deselect selected options
                deselect() {
                    setTimeout(() => {
                        this.selected = []
                        this.selectedElms = []
                        Object.keys(this.options).forEach((key) => {
                            this.options[key].selected = false;
                        })
                    }, 100)
                },
                // select given option
                select(index, event) {
                    if (!this.options[index].selected) {
                        this.options[index].selected = true;
                        this.options[index].element = event.target;
                        this.selected.push(this.options[index].value);
                        this.selectedElms.push(this.options[index]);

                    } else {
                        this.selected.splice(this.selected.lastIndexOf(index), 1);
                        this.options[index].selected = false
                        Object.keys(this.selectedElms).forEach((key) => {
                            if (this.selectedElms[key].value == this.options[index].value) {
                                setTimeout(() => {
                                    this.selectedElms.splice(key, 1)
                                }, 100)
                            }
                        })
                    }
                },
                // remove from selected option
                remove(index, option) {
                    this.selectedElms.splice(index, 1);
                    Object.keys(this.options).forEach((key) => {
                        if (this.options[key].value == option.value) {
                            this.options[key].selected = false;
                            Object.keys(this.selected).forEach((skey) => {
                                if (this.selected[skey] == option.value) {
                                    this.selected.splice(skey, 1);
                                }
                            })
                        }
                    })
                },
                // filter out selected elements
                selectedElements() {
                    return this.options.filter(op => op.selected === true)
                },
                // get selected values
                selectedValues() {
                    return this.options.filter(op => op.selected === true).map(el => el.value)
                }
            }));

        });

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
