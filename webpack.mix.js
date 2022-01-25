const mix = require("laravel-mix");

require("laravel-mix-tailwind");
require("laravel-mix-blade-reload");
require('laravel-mix-eslint')

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
mix.copy("./vendor/wireui/wireui/dist/wireui.js", "./public/js/wireui.js");
mix.webpackConfig({
    node: false
});

mix.postCss("resources/sass/critical.css", "public/css", [
        require("tailwindcss"),
    ]);

mix.js("resources/js/app.js", "public/js/app.js")
    .js("resources/js/minimal.js", "public/js/")
    .eslint({
        fix: true,
        extensions: ['js']
    })
    .sass("resources/sass/app.scss", "public/css/app.css")
    .sass("resources/sass/fonts.scss", "public/css/fonts.css")
    .tailwind("./tailwind.config.js")
    .copy("resources/images/", "public/images/")
    .copy("resources/images/favicon.ico", "public/")
    .copy("resources/videos/", "public/videos/")
    .copy("resources/fonts/", "public/fonts/")
    .sourceMaps(!mix.inProduction());

mix.webpackConfig({
    devServer: {
        allowedHosts: "all",
        watchFiles: [
            "resources/**/*.php",
            "resources/**/*.js",
            "resources/**/*.css",
            "resources/**/*.scss",
        ],
    },
});

if (mix.inProduction()) {
    mix.version();
} else {
    mix.bladeReload();
}
