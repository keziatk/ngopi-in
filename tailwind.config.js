import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // ⬅️ PENTING untuk dark mode

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
                body: ['Inter', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                coffee: {
                    dark: '#0F0F0F',     // background utama
                    card: '#1A1A1A',     // card
                    brown: '#4B2E2B',    // primary
                    cream: '#D6C3A3',    // accent
                },
            },

            boxShadow: {
                coffee: '0 10px 25px rgba(0,0,0,0.4)',
            },

            borderRadius: {
                xl: '1rem',
                '2xl': '1.25rem',
            },
        },
    },

    plugins: [forms],
};
