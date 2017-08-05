const { mix } = require('laravel-mix');
const path = require('path')
var BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

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

 mix.webpackConfig({

   plugins: [

    new BundleAnalyzerPlugin({

      openAnalyzer: false,
      generateStatsFile: true,

    })

  ],
   devtool:'eval-source-map',

  // devtool: false,
  module: {
          rules: [{
              test: /\.scss$/,
              use: [{
                  loader: "style-loader" // creates style nodes from JS strings
              }, {
                  loader: "css-loader" // translates CSS into CommonJS
              }, {
                  loader: "sass-loader" // compiles Sass to CSS
              }]
          }]
      },

   resolve:{

    alias:{

      //sets Js to root directory + 'resources/assets/js' folder
      JS:path.resolve(__dirname,'resources/assets/js'),
      CSS:path.resolve(__dirname,'resources/assets/css'),

    }

    },

 });
//
//
//
//
// mix.js('node_modules/bootstrap-filestyle/src/bootstrap-filestyle.min.js', 'public/js')
//    .js('node_modules/lodash/lodash.min.js', 'public/js')
//    .js('node_modules/jscroll/jquery.jscroll.js', 'public/js')
//    .js('resources/assets/js/friendsPageJquery.js','public/js')
//    .js('resources/assets/js/settingsPageJquery.js','public/js');

mix.react('resources/assets/js/app.jsx', 'public/js/user_bundle.js')

// mix.sass('resources/assets/sass/friends-page.scss','public/css')
  //  mix.sass('resources/assets/sass/app.scss','public/css');

mix.stylus('resources/assets/css/custom-css.css','public/css');




mix.styles([

  'public/css/custom-css.css',
  'public/css/friends-page.css'

  ],'public/css/combinedCustomCSS.css');

mix.scripts([

  'public/js/friendsPageJquery.js',
  'public/js/settingsPageJquery.js'


], 'public/js/combinedCustomJS.js');

mix.scripts([

  'public/js/bootstrap-filestyle.min.js',
  'public/js/jquery.jscroll.js',
  'public/js/lodash.min.js'

], 'public/js/third-party-modules.js');

mix.copy('resources/views/gifs', 'public/gifs');
