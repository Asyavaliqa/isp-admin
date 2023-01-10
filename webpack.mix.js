const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/scss/vendors/simplebar.scss', 'public/css');
mix.sass('resources/scss/style.scss', 'public/css');

mix.js([
    'resources/js/charts.js',
    'resources/js/colors.js',
    'resources/js/main.js',
    'resources/js/popovers.js',
    'resources/js/toasts.js',
    'resources/js/tooltips.js',
    'resources/js/widgets.js'
], 'public/js')

mix.copyDirectory('resources/assets', 'public/assets')

if (mix.inProduction()) {
    mix.minify();
    mix.sourceMaps();
    mix.version();
}
