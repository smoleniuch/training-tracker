<?php
  require_once("core/init.php");
  //unset all sesion values

  $user = new User();
  $user->logout();

  Redirect::to("index.php");

 ?>
