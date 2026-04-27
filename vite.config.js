import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],

    server: {
        host: '127.0.0.1',   // 🔥 FORCE IPv4 (fixes your issue)
        port: 5173,
        strictPort: true,

        hmr: {
            host: '127.0.0.1', // 🔥 CRITICAL (fix websocket)
        },

        watch: {
            usePolling: true,
            interval: 100,
        },
    },
});