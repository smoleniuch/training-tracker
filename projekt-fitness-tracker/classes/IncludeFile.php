<?php

  class IncludeFile{

    public function header($path){

      include_once($path);

    }

    public function panel($path = false){

      if(!$path){

        if($path = Session::get("panel_path")){


        }
        else{

          $path =  Config::get("default_files/panel");

        }


      }

      if(file_exists($path)){

        include($path);
        return true;
      }

      return false;

    }

    public function content($path = false){

      if(!$path){

        if($path = Session::get("content_path")){


        }
        else{

          $path =  Config::get("default_files/content");

        }


      }

      if(file_exists($path)){

        include($path);
        return true;
      }

      return false;
    }

  }

 ?>
