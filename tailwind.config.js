import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                'main-color': "#159947",
                'secondary-color': "#272727",
                'grey-color': '#B5B5B5'
            }
        },
        fontFamily: {
            TitanOne: ['Titan One', 'sans-serif'],
            Nunito: ['Nunito', 'sans-serif']
        },
        screens: {
            sm: "340px",
            md: "440px",
            lg: "768px",
            xl: "1180px",
        },
        container: {
            center: true,
            padding: {
                DEFAULT: "12",
                md: "32px"
            }
        },
    },
    plugins: [],
};
