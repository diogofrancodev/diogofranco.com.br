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
            input: ['resources/css/site.css','resources/js/site.js','resources/css/admin/admin.css','resources/js/admin/admin.js'],
            refresh: true,
        }),
    ],
});
