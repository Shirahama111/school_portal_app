import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'pastelblue-100': '#a1eafb',
                'pastelblue-500': '#a1e5fb',
                'pastelblue-900': '#a1e1fb',
                'pastelpink-100': '#ffcefa',
                'pastelpink-500': '#ffcef5',
                'pastelpink-900': '#ffceea',
                'pastelpurple-100': '#cabbe9',
                'pastelpurple-500': '#cabbe5',
                'pastelpurple-900': '#cabbfa',
            },
        },
    },

    plugins: [forms],
};
