import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    
    plugins: [
        laravel({
            input: ['theme/assets/js/app.js'],
            publicDirectory: 'theme',
            //input: ['Theme/assets/js/app.js'],
            refresh: true, 
            hotFile: 'theme/vite.hot', // Customize the "hot" file...
            buildDirectory: 'bundle', // Customize the build directory...
            input: ['theme/assets/js/app.js'], // Specify the entry points...
        }),
    ],
    root: './',
    publicDir: 'theme'
});
