import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: [
                    "Instrument Sans",
                    "ui-sans-serif",
                    "system-ui",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
            },
            colors: {
                primary: "#2E3D8A",
                secondary: "#3E4C9D",
                tertiary: "#F0F2F6",
                interactible: {
                    primary: {
                        DEFAULT: "#FFFFFF",
                        active: "#5D71D6",
                    },
                    secondary: {
                        DEFAULT: "#5D71D6",
                        active: "#FFFFFF",
                    },
                },
                icon: {
                    primary: {
                        DEFAULT: "#F0F2F6",
                        active: "#F0F2F6",
                    },
                },
            },
        },
    },

    plugins: [forms],
};
