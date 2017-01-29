<?php
require_once("core/init.php");

if(Input::exists()){

  $register_validation = new Validation();

  $register_validation->checkPassword(Input::get("password"),"password");
  $register_validation->checkUsername(Input::get("username"),"username");
  $register_validation->checkEmail(Input::get("email"),"email");
  $register_validation->assertEquals(Input::get("confirmpwd"),Input::get("password"),"confirmpwd");

  if($register_validation->countErrors() == 0){


    UserManager::create(array(

            "username" => Input::get("username"),
            "password" => Input::get("password"),
            "email" => Input::get("email"),
            "level" => "1",
            "joined" => date('Y-m-d h:i:s')));

    Session::flash("register-success",generate_html_success("You have been registered."));
    Redirect::to('index.php');
  }


}

  $panel = new Template("Templates/register.tpl");
  $panel = $panel->output();

  $layout = new Template("Templates/layout.tpl");
  $layout->set(array("panel" => $panel));

  echo $layout->output();

 ?>
