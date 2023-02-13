import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'
import { Input } from 'postcss';

export default defineConfig({
    plugins: [
        laravel(

                {
                    input: [
                        'resources/js/app.js',
                        'resources/css/app.css',
                        'resources/js/modales.js',
                        'resources/css/newStyle.css',
                        'resources/css/style.css',
                        'resources/css/darkmode.css',
                        'resources/js/darkmode.js',
                        'resources/js/fontsize.js',
                        'resources/js/jquery3.6.3.js'
                    ],
                    refresh: true,
                }),



    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),

        }
    },

});
