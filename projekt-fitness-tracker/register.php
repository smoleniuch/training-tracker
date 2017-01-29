<?php

  include_once("includes/register.inc.php");
  include_once("includes/functions.php");
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

      Session::flash("login-success",generate_html_success("You have been registered."));
      Redirect::to('index.php');
    }


  }

 ?>


<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1.0">
    <link href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap-3.3.7-dist/css/my-css.css" rel="stylesheet" type="text/css">
    <script type="text/Javascript" src="js/sha512.js"></script>
    <script type="text/Javascript" src="js/forms.js"></script>

  </head>

  <body>



      <form class="form-group" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" name="registration_form">

           Username: <input type='text' name='username' id='username' value="<?php echo Input::get("username") ?>" class="form-control"/><br>
            <?php echo Input::exists()?$register_validation->displayError("username"):null;  ?>

           Email: <input type="text" name="email" id="email" value="<?php  echo escape(Input::get("email")); ?>" class="form-control"/><br>
           <?php echo Input::exists()?$register_validation->displayError("email"):null;  ?>
           Password: <input type="password" name="password" id="password" class="form-control"/><br>
           <?php echo Input::exists()?$register_validation->displayError("password"):null;  ?>
           Confirm password: <input type="password" name="confirmpwd" id="confirmpwd" class="form-control" /><br>
           <?php echo Input::exists()?$register_validation->displayError("confirmpwd"):null;  ?>
           <input class="btn btn-default" type="button" value="Register" onclick="form.submit()" />
       </form>
       <ul>
            <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>

       <p>Return to the <a href="index.php">login page</a>.</p>


  </body>

</html>
