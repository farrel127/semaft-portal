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
                // Tambahkan palet warna kita di sini:
                colors: {
                    semaft: {
                        navy: '#1e1160',
                        gold: '#f4c332',
                    }
                }
            },
        },

        plugins: [forms],
    };