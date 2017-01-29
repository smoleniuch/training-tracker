<?php
  session_start();

  $GLOBALS["config"] = array(

    "mysql" => array(

      'host' => "127.0.0.1",
      'username' => "root",
      'password' => "",
      "database" => "fitnessadmin",
      "charset" => "UTF8",
      "port" => "n/a"

    ),
    "remember" => array(

      "cookie_name" => "hash",
      "cookie_expiry" => 60*60*24*7

    ),
    "session" => array(

      "session_name" => "user"

    ),
    "default_files" => array(

      "header" => "header.php",
      "panel" => "login-form.php",
      "content" => "content.php"

    ),
    "profile" => array(

      "default-avatar" => "uploads/avatars/default-avatar.jpeg"

    )

  );
/**
 * Load all classes.
 */
spl_autoload_register(function($class){

  require_once("classes/" . $class . ".php");

});

require_once("includes/functions.php");



?>
