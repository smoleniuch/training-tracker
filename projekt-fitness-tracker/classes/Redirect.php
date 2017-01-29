<?php

  class Redirect {

    public static function to($location = null){

      if($location){

        if(is_numeric($location)){

          switch ($location){

            case 404:
              header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
              include("includes/errors/404.php");
              exit();

          }


        }

        header("Location: " . $location);
        exit();
      }

    }

  }

 ?>
