<?php

require_once("core/init.php");

class ProfileController
{
    public function displayProfile()
    {
        // '/profile/24'
        $found;
        $profile_id = preg_match('/\d+/', $_SERVER['REQUEST_URI'], $found);

        $user = new User();

        if(!$user->isLoggedIn()){

          Redirect::to("login.php");

        }

        $panel = new Template("Templates/panel.tpl");
        $user_id = $found[0];

        $panel->set(array("user_id" => $user_id));
        $panel = $panel->output();

        $layout = new Template("Templates/layout.tpl");
        $layout->set(array("panel" => $panel));


        return $layout->output();
    }
}