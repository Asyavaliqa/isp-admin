import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',

                // SCSS Resources
                'resources/scss/style.scss',
                'resources/scss/vendors/simplebar.scss',

                // JS Resources
                'resources/js/app.js',
                'resources/js/charts.js',
                'resources/js/colors.js',
                'resources/js/main.js',
                'resources/js/popovers.js',
                'resources/js/toasts.js',
                'resources/js/tooltips.js',
                'resources/js/widgets.js',

                // Vendor SCSS
                'node_modules/@coreui/chartjs/dist/css/coreui-chartjs.css',

                // Vendor JS
                'node_modules/chart.js/js/chart.min.js',
                'node_modules/@coreui/chartjs/js/coreui-chartjs.js',
                'node_modules/@coreui/utils/js/coreui-utils.js',
            ],
            refresh: true,
        }),
    ],
});
