<?php

  include_once("includes/functions.php");
  require_once("core/init.php");


  if(Input::exists()){

    $register_validation = new Validation();

    $register_validation->checkPassword(Input::get("password"),"password-error");
    $register_validation->checkUsername(Input::get("username"),"username-error");
    $register_validation->checkEmail(Input::get("email"),"email-error");
    $register_validation->assertEquals(Input::get("confirmpwd"),Input::get("password"),"confirmpwd-error");

    $errors = $register_validation->displayErrors();
    if($register_validation->countErrors() == 0){


      UserManager::create(array(

              "username" => Input::get("username"),
              "password" => Input::get("password"),
              "email" => Input::get("email"),
              "level" => "1",
              "joined" => date('Y-m-d h:i:s')));

      Session::flash("login-success",generate_html_success("You have been registered."));
      Redirect::to('login.php');
    }


  }

  //register form
  $register_template = new Template("Templates/register.tpl");

  //retype value in fields after refresh.
  if(input::exists()){
    //display errors
    $register_template->set($errors);
    //retype values in fields
    $register_template->set(array("username" => Input::get("username"),
                                  "email" => Input::get("email")));

  }
  $register_template = $register_template->output();

  //header
  $header = new Template("Templates/header.tpl");
  $header = $header->output();

  //panel
  $panel = new Template("Templates/login.tpl");
  $panel = $panel->output();

  $layout = new Template("Templates/layout.tpl");
  $layout->set(array("panel" => $register_template,
                     "header" => $header));

  echo $layout->output();
 ?>
