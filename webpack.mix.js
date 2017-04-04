const { mix } = require('laravel-mix');

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



mix.scripts([

    'resources/assets/js/friendsPageJquery.js',
    'resources/assets/js/settingsPageJquery.js',

], 'resources/assets/js/allCustom.js');

mix.scripts([

    'node_modules/bootstrap-filestyle/src/bootstrap-filestyle.min.js',

], 'resources/assets/js/third-party-modules.js');



mix.styles([

	'resources/assets/css/friends-page.css',
	'resources/assets/css/custom-css.css'

],'resources/assets/css/allCustomCSS.css');

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/allCustom.js', 'public/js')
   .js('resources/assets/js/third-party-modules.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.stylus('resources/assets/css/allCustomCSS.css','public/css')







