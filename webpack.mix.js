let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//     .sass('resources/assets/sass/app.scss', 'public/css');


var paths = {
    'bootstrap': './node_modules/bootstrap-sass/assets/'
}

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        sassOptions: {
            includePaths: [
                paths.bootstrap + 'stylesheets/'
            ]
        }
    })
    .copyDirectory(paths.bootstrap + 'fonts/bootstrap/', 'public/fonts/bootstrap')

    .scripts([
        'resources/js/xhr.js',
    ], 'public/js/custom.js')
    .sourceMaps(true, 'source-map');

mix.browserSync('http://bluebees4u.test');