import { defineConfig, mergeConfig } from 'vite';
import baseConfig from '../support/base.config.js';
import path from 'path';
import laravel from 'laravel-vite-plugin';

export default defineConfig(
    mergeConfig(baseConfig, {
        base: '/vendor/health/',
        resolve: {
            alias: {
                '@': path.resolve(__dirname, 'resources/js'),
            },
        },
    }),
);
