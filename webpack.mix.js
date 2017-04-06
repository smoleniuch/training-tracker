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
   .js('node_modules/jscroll/jquery.jscroll.js', 'public/js')
   .js('resources/assets/js/friendsPageJquery.js','public/js')
   .js('resources/assets/js/settingsPageJquery.js','public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.stylus('resources/assets/css/custom-css.css','public/css')
   .stylus('resources/assets/css/friends-page.css','public/css');



   mix.styles([

     'public/css/custom-css.css',
     'public/css/friends-page.css'

   ],'public/css/combinedCustomCSS.css');

mix.scripts([

    'public/js/friendsPageJquery.js',
    'public/js/settingsPageJquery.js',


], 'public/js/combinedCustomJS.js');

mix.scripts([

  'public/js/bootstrap-filestyle.min.js',
  'public/js/jquery.jscroll.js'

], 'public/js/third-party-modules.js');
