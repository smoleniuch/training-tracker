<?php


class LoginController
{
    public function displayLogin()
    {
        $user = new User();
        //if user is allready logged in redirect him to panel
        if ($user->isLoggedIn()) {
            Redirect::to('panel');
        }

        if (Input::exists()) {
            $email = Input::get("email");
            $password = Input::get("password");

            $loginAttempts = new LoginAttempts(DB::getInstance());
            $maxLoginAttempts = Config::get("user/login_attempts/max");
            $loginAttemptsPeriod = Config::get("user/login_attempts/time");

            $login_validation = new Validation();

            $login_validation->checkLoginCredentials($email, $password, "login-error");
            if($id = UserManager::getUserId($email)){
              //last two hours
              if($loginAttempts->getAmount($id,$loginAttemptsPeriod) >= $maxLoginAttempts){

                $login_validation->addError("Too many login attempts,try again later!","login-error");

              }

            }
            if ($login_validation->countErrors() == 0) {
                //success
                if ($user->login($email, $password)) {
                    Redirect::to("panel");
                } else {


                    if (UserManager::userExists($email)) {
                        $userId = UserManager::getUserData($email)->id;
                        $loginAttempts->add($userId);
                    }
                }

                $login_validation->addError("Wrong login or password.", "login-error");
            }
        }






        $login_form = new Template('Templates/login.tpl');
        //display login errors
        if (Input::exists()) {
            $login_form->set($login_validation->displayErrors());
        }
        $login_form = $login_form->output();

        $header = new Template('Templates/header.tpl');
        $header = $header->output();

        $layout = new Template("Templates/layout.tpl");
        $layout->set(array("header" => $header,
                       "panel" => $login_form));
        return $layout->output();
    }
}
