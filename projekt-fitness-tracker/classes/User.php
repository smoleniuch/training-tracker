<?php

  class User {

    private $db,
            $userData,
            $sessionName,
            $_isLoggedIn = false;

    public function __construct(){

      $this->db = DB::getInstance();
      $this->sessionName = Config::get("session/session_name");

      //if user is already logged
      if(Session::exists(Config::get("session/session_name"))){

        $id = Session::get(Config::get("session/session_name"));
        $this->userData = UserManager::getUserData($id);
        $this->_isLoggedIn = true;

      }
    }

    public function login($email,$password){
      //verify $password with database password.
      if(UserManager::checkPassword($email,$password)){

        $this->userData = UserManager::getUserData($email);
        //store user id in session
        $this->_isLoggedIn = true;
        Session::put($this->sessionName,$this->getData()->id);
        return true;

      }
      return false;
    }

    public function getData(){

      return $this->userData;

    }

    public function isLoggedIn(){

      return $this->_isLoggedIn;

    }

    public function logout(){

      Session::delete($this->sessionName);

    }
  }

 ?>
