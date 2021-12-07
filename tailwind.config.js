const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: `jit`,
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
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
            colors: {
                'sand': {
                    '50': '#fffefe',
                    '100': '#fffefd',
                    '200': '#fefcfb',
                    '300': '#fdfbf8',
                    '400': '#fcf7f3',
                    '500': '#faf4ee',
                    '600': '#e1dcd6',
                    '700': '#bcb7b3',
                    '800': '#96928f',
                    '900': '#7b7875'
                }
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
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    purge: {
        content: [
            './vendor/wireui/wireui/resources/**/*.blade.php',
            './vendor/wireui/wireui/ts/**/*.ts',
            './vendor/wireui/wireui/src/View/**/*.php',
            './app/**/*.php',
            './resources/**/*.js',
            './resources/**/*.php',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),

    ],
};
