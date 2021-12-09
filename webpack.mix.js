const mix = require("laravel-mix");

require("laravel-mix-tailwind");
require('laravel-mix-blade-reload');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.ts('./vendor/wireui/wireui/ts/index.ts', './public/js/wireui.js')

mix.js("resources/js/app.js", "public/js/app.js")
    .sass("resources/sass/app.scss", "public/css/app.css")
    .sass("resources/sass/fonts.scss", "public/css/fonts.css")
    .tailwind("./tailwind.config.js")
    .copy(
        'resources/images/',
        'public/images/'
    )
    .copy(
        'resources/videos/',
        'public/videos/'
    )
    .copy(
        'resources/fonts/',
        'public/fonts/'
    )
    .sourceMaps(!mix.inProduction());
mix
    .webpackConfig({
        devServer: {
            allowedHosts: 'all',
            watchFiles: [
                'resources/**/*.php',
                'resources/**/*.js',
                'resources/**/*.css',
                'resources/**/*.scss',
            ],
        },
    })

if (mix.inProduction()) {
    mix.version();
} else {
    mix.bladeReload();

}
