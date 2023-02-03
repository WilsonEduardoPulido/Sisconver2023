import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'
import { Input } from 'postcss';

export default defineConfig({
    plugins: [
        laravel(
            
                {
                    input: [
                        'resources/css/app.scss',
                        'resources/js/app.js',
                        'resources/css/app.css',
                        'resources/js/modales.js',
                        'resources/css/newStyle.css',
                        'resources/css/style.css',
                        'resources/js/jquery3.6.3.js',
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




