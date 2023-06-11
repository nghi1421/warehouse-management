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
        extend: {},
        colors: {
        transparent: 'transparent',
        current: 'currentColor',
        'primary': {
            400: '#34d399',
            DEFAULT: '#15803d',
            700: '#047857',
        },
        'secondary': '#fb923c',
        'error': '#dc2626',
        'danger': '#fbbf24',
        'success': '#22c55e'
        },
    },

    plugins: [forms],
};
