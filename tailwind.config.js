const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    // darkMode: 'class',
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "rgb(31, 41, 55)",
                secondary: "rgb(185 28 28)",
                transparent: "transparent",
                green: "rgba(180, 25, 25, 0.8)",
                "green-dark": "#065a68",
                "blue-light": "#b3d6f1",
                blue: "#0074d1",
                "blue-dark": "#072344",
                black: "#000000",
                white: "#ffffff",
                "yellow-lighter": "#f6e8c6",
                "yellow-light": "#f8edd0",
                "yellow-dark": "#daa512",
                "grey-lightest": "#eff0f3",
                "grey-lighter": "#eceef1",
                "grey-light": "#ccd7e0",
                grey: "#adb6c4",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/line-clamp"),
    ],
};
