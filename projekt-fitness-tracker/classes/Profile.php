<?php

class Profile{

  private $userID;

  public function __construct($id = null){

    $this->userID = $id;
    if($id == null){
      //if user is logged in,set his id.
      if(Session::get(Config::get('session/session_name'))){

        $this->userID = Session::get(Config::get('session/session_name'));

      }

    }

  }

  public function getAvatar(){



  }

}

 ?>
