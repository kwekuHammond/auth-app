import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // base: '/localhost:8001',
    server: {
        proxy: {
            '/': {
                target: 'localhost:8001', // Your Laravel server URL
                changeOrigin: true,
                ws: true,
            },
            // '/ws': {
            //     target: 'localhost:6001',
            //     changeOrigin: true,
            //     ws: true,
            // },
        },
    },
});
