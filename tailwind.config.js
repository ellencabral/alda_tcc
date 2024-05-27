import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/*.js',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            'primary': {
                700: '#00C7BE',
                800: '#00B1A6',
                900: '#008B79',
            },
            'secondary': {
                300: '#FD7E8B',
                400: '#FF5C6C',
                500: '#FF4853',
            },
            'gray': {
                200: '#EAEBEC',
                400: '#B8B9BA',
                600: '#707172',
            },
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                ...colors
            }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
