<?php
  session_start();

  $GLOBALS["config"] = array(

    "mysql" => array(

      'host' => "127.0.0.1",
      'username' => "root",
      'password' => "",
      "database" => "fitnessAdmin",
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

    "user" => array(
      "login_attempts" => array(
        "time" => 60*60*2, //seconds
        "max" => 5
      ),
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
