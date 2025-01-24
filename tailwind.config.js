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
                BarvaTlacitka1: '#3d8f48', // Barva: #3d8f48
                BarvaTlacitka2: '#faf7f5', // Barva: #faf7f5
                BarvaTlacitka3: '#faf7c5', // Barva: #faf7c5
            },
        },
    },

    plugins: [forms],
};
