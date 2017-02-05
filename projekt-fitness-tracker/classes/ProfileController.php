<?php

require_once("core/init.php");

class ProfileController
{
    public function displayProfile()
    {
        if (preg_match('/profile\/(\d+)/', $_SERVER['REQUEST_URI'], $user_id)) {
            $user_id = $user_id[1];
        } else {
            $user_id = false;
        }

        $user = new User();

        if (!$user->isLoggedIn()) {
            Redirect::to("login");
        }
        //if there is no users id profile in url display logged user as default
        if (!$user_id) {
            $user_id = $user->getData()->user_id;
        }

        $profileData = ProfileManager::getProfileData($user_id);

        //set content
        $profile = new Template("Templates/profile.tpl");
        if ($profileData) {
            $profile->set($profileData);
        };
        $profile = $profile->output();
        //set panel
        $panel = new Template("Templates/menu.tpl");
        if (!empty($profileData)) {
            //set avatar
            $panel->set(array("user_avatar" => Config::get("paths/main") . $profileData["user_avatar"]));
        }

        $panel = $panel->output();

        //set main layout
        $layout = new Template("Templates/layout.tpl");
        $layout->set(array("content" => $profile,
                           "panel" => $panel,
                           "main-directory" => Config::get("paths/main")));


        return $layout->output();
    }
}
