import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/sass/critical.css',
                'resources/sass/fonts.scss',
                'resources/js/app.js',
                'resources/js/minimal.js',
            ],
            refresh: true,
        }),
    ],
});
