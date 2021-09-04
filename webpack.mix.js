const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/calender.scss', 'public/css')
    .sass('resources/sass/katamenu.scss', 'public/css')
    .sass('resources/sass/munemenu.scss', 'public/css')
    .sass('resources/sass/haramenu.scss', 'public/css')
    .sass('resources/sass/sirimenu.scss', 'public/css')
    .sass('resources/sass/ashimenu.scss', 'public/css');
