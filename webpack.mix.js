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
    .autoload({
        jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
    })
    .vue();

// mix.autoload({
//     jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
// });

// mix.js('resources/assets/js/app.js', 'public/js')
//    .extract(['jquery', 'vue','select2','slick'])
//    .vue()
//    .sourceMaps()
//    .sass('resources/sass/app.scss', 'public/css')
//    .version();