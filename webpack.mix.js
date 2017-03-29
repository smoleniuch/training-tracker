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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('node_modules/bootstrap-filestyle/src/bootstrap-filestyle.min.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.stylus('resources/assets/css/friends-page.css','public/css')
   .stylus('resources/assets/css/custom-css.css','public/css');

mix.styles([

	'public/css/custom-css.css',
	'public/css/friends-page.css'

],'public/css/allCustomCSS.css');
