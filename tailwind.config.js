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
                'primary': '#2563eb',
                'accent': '#22c55e',
                'warning': '#f59e0b',
                'danger': '#ef4444',
                'dark-bg': '#0b1220',
                'card-bg': '#0f172a',
            },
            boxShadow: {
                'card': '0 10px 20px rgba(0, 0, 0, 0.25)',
            },
        },
    },

    plugins: [forms],
};
