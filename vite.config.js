import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy'


export default defineConfig({
    plugins: [
        viteStaticCopy({
            targets: [
              {
                src: 'resources/assets',
                dest: ''
              }
            ]
        }),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
