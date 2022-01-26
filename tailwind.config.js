const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require("tailwindcss/colors");

module.exports = {
    darkMode: null,
    theme: {
        container: {
            screens: {
                'print': {'raw': 'print'},
                sm: "100%",
                md: "100%",
                lg: "1024px",
                xl: "1280px"
            }
        },
        extend: {
            fontSize: {
                '2xs': '.5rem'
            },
            spacing: {
                '4.5': '1.13rem'
            },
            colors: {
                blueGray: colors.slate,
                primary: colors.indigo,
                secondary: colors.gray,
                positive: colors.emerald,
                negative: colors.red,
                warning: colors.amber,
                info: colors.blue,
            },

            animation: {
                blob: "blob 4s infinite",
            },
            transitionDuration: {
                '2000': '2000ms',
                '3000': '3000ms',
            },
            keyframes: {
                blob: {
                    "0%": {
                        transform: "translate(0px, 0px) scale(1)",
                    },
                    "33%": {
                        transform: "translate(30px, -50px) scale(1.1)",
                    },
                    "66%": {
                        transform: "translate(-20px, 20px) scale(0.9)",
                    },
                    "100%": {
                        transform: "tranlate(0px, 0px) scale(1)",
                    },
                },
            },
            scale: {
                '200': '2',
                '300': '3',
                '400': '4',

            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            transitionProperty: {
                'width': 'max-width'
            },

        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    content: [
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php',
        './app/**/*.php',
        './resources/**/*.js',
        './resources/**/*.php',
    ],
    plugins: [
        require("@tailwindcss/forms")({
            strategy: 'class',
        }),
        require('@tailwindcss/typography'),

    ],
};
