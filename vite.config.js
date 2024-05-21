import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import sassGlobImports from "vite-plugin-sass-glob-import";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/scripts/app.js'],
            refresh: false,
        }),
        vue({
            template: {
                base: null,
                includeAbsolute: false
            }
        }),
        sassGlobImports()
    ],
});
