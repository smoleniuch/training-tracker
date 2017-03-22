<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer(

          '*','App\Http\ViewComposers\UserComposer@loggedUserAvatar'

        );

        view()->composer(

          'pages.settings.profile','App\Http\ViewComposers\UserComposer@userProfileData'

        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
