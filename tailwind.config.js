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
        },
    },

    safelist: [
        {
            pattern: /bg-(success|danger|warning|blue|orange)-(100|400|500|600|800)/,
        },
        {
            pattern: /border-(success|danger|warning|blue)-(100|400|500|600|800)/,
        },
        {
            pattern: /text-(success|danger|warning|blue)-(100|400|500|600|800)/,
        },
    ],

    plugins: [
        forms,
        require('daisyui'),
    ],

    daisyui: {
        themes: [
            {
                light: {
                    "primary": "#f97316", // orange-500
                    "primary-focus": "#ea580c", // orange-600
                    "primary-content": "#ffffff",

                    "secondary": "#6b7280", // gray-500
                    "secondary-focus": "#4b5563", // gray-600
                    "secondary-content": "#ffffff",

                    "accent": "#f59e0b", // amber-500
                    "accent-focus": "#d97706", // amber-600
                    "accent-content": "#ffffff",

                    "neutral": "#374151", // gray-700
                    "neutral-focus": "#1f2937", // gray-800
                    "neutral-content": "#ffffff",

                    "base-100": "#ffffff",
                    "base-200": "#f9fafb", // gray-50
                    "base-300": "#f3f4f6", // gray-100
                    "base-content": "#1f2937", // gray-800

                    "info": "#3b82f6", // blue-500
                    "success": "#10b981", // green-500
                    "warning": "#f59e0b", // amber-500
                    "error": "#ef4444", // red-500
                }
            }
        ]
    }
};
