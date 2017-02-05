<?php

require_once("core/init.php");

class PanelController
{
    public function displayPanel()
    {
        $user = new User();

        if(!$user->isLoggedIn()){

          Redirect::to("login");

        }

        $panel = new Template("Templates/menu.tpl");
        $user_id = $user->getData()->user_id;

        $panel->set(array("user_id" => $user_id));
        $panel = $panel->output();

        $layout = new Template("Templates/layout.tpl");
        $layout->set(array("panel" => $panel,
                           "main-directory" => Config::get("paths/main")));



        return $layout->output();
    }
}
