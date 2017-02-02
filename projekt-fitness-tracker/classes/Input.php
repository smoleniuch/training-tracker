<?php

  class Input {

    public static function exists($type = 'post'){

      switch ($type){

          case "post":
            return !empty($_POST)? true:false;
            break;

          case "get":
            return !empty($_GET)? true:false;
            break;

          default:
            return false;
            break;

      }

    }

    public static function get($field,$method = "post"){

      if($method == "post" && !empty($_POST[$field])){

        return $_POST[$field];

      }
      else if($method == "get" && !empty($_GET[$field])){

        return $_GET[$field];

      }

      return "";
    }
  }

 ?>
