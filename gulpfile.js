 var elixir = require('laravel-elixir');

    var nodeDir = './node_modules/';

    /*
     |--------------------------------------------------------------------------
     | Elixir Asset Management
     |--------------------------------------------------------------------------
     |
     | Elixir provides a clean, fluent API for defining some basic Gulp tasks
     | for your Laravel application. By default, we are compiling the Sass
     | file for our application, as well as publishing vendor resources.
     |
     */
    elixir(function(mix) {
    //mix css first and copy the needed fonts

    //mix.css('app.css', 'public/css',)
        mix.styles([
            'bootstrap/dist/css/bootstrap.css',
            'font-awesome/css/font-awesome.css'
        ], './public/css/app.css', nodeDir)
            .copy(nodeDir + 'font-awesome/fonts', 'public/fonts')
            .copy(nodeDir + 'bootstrap/fonts', 'public/fonts');

    //mix javascript

        mix.scripts([
            'jquery/dist/jquery.js',
            'bootstrap/dist/js/bootstrap.js'

        ], './public/js/app.js', nodeDir);


    });
