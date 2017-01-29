<?php
    require_once("core/init.php");
    var_dump(implode("<br>",$_SERVER));
    if (Input::exists()) {

        $login_validation = new Validation();
      //checks if input is not empty.
      $login_validation->checkLoginCredentials(Input::get("email"), Input::get("password"), "login");

        if ($login_validation->countErrors() == 0) {
            $user = new User();
            if ($user->login(Input::get("email"), Input::get("password"))) {
                Redirect::to("index.php");
            } else {
                $login_validation->addError("Wrong login or password.", "login");
            }
        }
    }

    $loginForm = new Template("Templates/login.tpl");
    $panel = $loginForm->output();

    $layout = new Template("Templates/layout.tpl");
    $layout->set(array("panel" => $panel));

    echo $layout->output();

 ?>
