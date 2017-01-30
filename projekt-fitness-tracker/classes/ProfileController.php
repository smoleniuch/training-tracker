<?php

require_once("core/init.php");

class ProfileController
{
    public function displayProfile()
    {


        if(preg_match('/\d+/', $_SERVER['REQUEST_URI'], $user_id)){

          $user_id = $user_id[0];

        }
        else{

          $user_id = false;

        }

        $user = new User();

        if(!$user->isLoggedIn()){

          Redirect::to("login.php");

        }
        //set content
        $profile = new Template("Templates/profile.tpl");
        $profile->set(array("user_id" => $user_id));
        $profile = $profile->output();
        //set panel
        $panel = new Template("Templates/panel.tpl");
        $panel = $panel->output();

        //set main layout
        $layout = new Template("Templates/layout.tpl");
        $layout->set(array("content" => $profile,
                           "panel" => $panel));


        return $layout->output();
    }
}
