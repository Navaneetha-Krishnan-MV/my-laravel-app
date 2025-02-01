import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/home.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@import "@/sass/variables";`  // Optional: global SCSS variables, mixins, etc.
            }
        }
    }  ,
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/css'), // Correct alias for SCSS files
        },
    },
    
    
});
