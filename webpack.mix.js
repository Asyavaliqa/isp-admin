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

mix.js('resources/js/charts.js', 'public/js');
mix.js('resources/js/colors.js', 'public/js');
mix.js('resources/js/main.js', 'public/js');
mix.js('resources/js/popovers.js', 'public/js');
mix.js('resources/js/toasts.js', 'public/js');
mix.js('resources/js/tooltips.js', 'public/js');
mix.js('resources/js/widgets.js', 'public/js');

mix.copyDirectory('resources/assets', 'public/assets')

mix.copyDirectory('resources/vendors', 'public/vendors')

if (mix.inProduction()) {
    mix.minify();
    mix.sourceMaps();
    mix.version();
}
