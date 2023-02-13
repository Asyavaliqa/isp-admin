const mix = require('laravel-mix');
const { resolve } = require('path')
const { cwd, exit } = require('process')
const { readFileSync, existsSync, read } = require('fs')

require('laravel-mix-clean');

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

const PATH = 'public'

let ignore = []
const gitignorePath = resolve(cwd(), PATH, '.gitignore')

if (existsSync(gitignorePath)) {
    const content = readFileSync(gitignorePath, 'utf8')

    ignore = content.split(/\r?\n/).filter(item => item)
}

mix.clean({
    cleanOnceBeforeBuildPatterns: ignore
})

mix.sass('resources/scss/vendors/simplebar.scss', PATH + '/css');
mix.sass('resources/scss/style.scss', PATH + '/css');

mix.js('resources/js/charts.js', PATH + '/js');
mix.js('resources/js/colors.js', PATH + '/js');
mix.js('resources/js/main.js', PATH + '/js');
mix.js('resources/js/popovers.js', PATH + '/js');
mix.js('resources/js/toasts.js', PATH + '/js');
mix.js('resources/js/tooltips.js', PATH + '/js');
mix.js('resources/js/widgets.js', PATH + '/js');
mix.copy('resources/js/datatable-id.json', PATH + '/js');

mix.copyDirectory('resources/assets', PATH + '/assets')

mix.copyDirectory('resources/vendors', PATH + '/vendors')

mix.version();

if (mix.inProduction()) {
    mix.sourceMaps();
}
