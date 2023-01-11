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

const PATH = resolve(cwd(), 'public')

let ignore = []
const gitignorePath = resolve(PATH, '.gitignore')

if (existsSync(gitignorePath)) {
    const content = readFileSync(gitignorePath, 'utf8')

    ignore = content.split(/\r?\n/).filter(item => item)
}

mix.options({
    fileLoaderDirs: {
        images: 'images',
        fonts: 'fonts'
    },
})

mix.setResourceRoot(PATH)

mix.clean({
    cleanOnceBeforeBuildPatterns: ignore
})

mix.sass('resources/scss/vendors/simplebar.scss', 'css');
mix.sass('resources/scss/style.scss', 'css');

mix.js('resources/js/charts.js', 'js');
mix.js('resources/js/colors.js', 'js');
mix.js('resources/js/main.js', 'js');
mix.js('resources/js/popovers.js', 'js');
mix.js('resources/js/toasts.js', 'js');
mix.js('resources/js/tooltips.js', 'js');
mix.js('resources/js/widgets.js', 'js');

mix.copyDirectory('resources/assets', resolve(PATH, 'assets'))

mix.copyDirectory('resources/vendors', resolve(PATH, 'vendors'))

if (mix.inProduction()) {
    mix.minify();
    mix.sourceMaps();
    mix.version();
}
