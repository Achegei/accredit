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
        host: true, // 👈 important for proper HMR
        watch: {
            usePolling: true, // 👈 THIS is the real fix
            interval: 100,    // optional (makes it more responsive)
        },
    },
});