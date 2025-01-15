import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    'darkMode': 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'text': {
                    50: '#050316',
                    100: '#0b062d',
                    200: '#160d59',
                    300: '#211386',
                    400: '#2b19b3',
                    500: '#3620df',
                    600: '#5e4ce6',
                    700: '#8779ec',
                    800: '#afa6f2',
                    900: '#d7d2f9',
                    950: '#ebe9fc',
                },
                'background': {
                    50: '#050514',
                    100: '#0a0a29',
                    200: '#141452',
                    300: '#1f1f7a',
                    400: '#2929a3',
                    500: '#3333cc',
                    600: '#5c5cd6',
                    700: '#8585e0',
                    800: '#adadeb',
                    900: '#d6d6f5',
                    950: '#ebebfa',
                },
                'primary': {
                    50: '#050415',
                    100: '#0a082b',
                    200: '#141056',
                    300: '#1e1881',
                    400: '#2821ab',
                    500: '#3129d6',
                    600: '#5b54de',
                    700: '#847ee7',
                    800: '#ada9ef',
                    900: '#d6d4f7',
                    950: '#eaeafb',
                },
                'secondary': {
                    50: '#01001a',
                    100: '#030033',
                    200: '#050066',
                    300: '#080099',
                    400: '#0a00cc',
                    500: '#0d00ff',
                    600: '#3d33ff',
                    700: '#6e66ff',
                    800: '#9e99ff',
                    900: '#cfccff',
                    950: '#e7e5ff',
                },
                'accent': {
                    50: '#01001a',
                    100: '#020033',
                    200: '#030066',
                    300: '#050099',
                    400: '#0700cc',
                    500: '#0800ff',
                    600: '#3a33ff',
                    700: '#6b66ff',
                    800: '#9c99ff',
                    900: '#ceccff',
                    950: '#e6e5ff',
                },
            },

        },
    },

    plugins: [
        require('flowbite/plugin')
    ],
};
