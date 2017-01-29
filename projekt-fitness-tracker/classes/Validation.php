<?php
//dirname(__FILE__,1);

//include_once("../core/init.php");
//header("Location: ../core");


  class Validation
  {
      private $_passed = false;
      private $_errors = array();
      private $_db = null;

      public function __construct()
      {
          $this->_db = DB::getInstance();
      }

      public function checkLoginCredentials($email,$password,$field){
        //empty values
        if(empty($email) || empty($password)){

          $this->addError("All fields must be filled.",$field);
          return false;

        }


         return true;

      }
      public function checkUsername($value, $field)
      {
          //check if its empty
          if (empty($value)) {
              $this->addError("Username is required.", $field);
              return false;
          }
          //check if it contain proper symbols
          $regexp = "/^\w+$/";
          if (!preg_match($regexp, $value)) {
              $this->addError("Username does not fulfill requirements.", $field);
              return false;
          }


        //check if username is uniqe
          $db = DB::getInstance();
          $db->query("SELECT * FROM `members` WHERE `username` = :username", array(":username"=>$value));

          if ($db->count() > 0) {
              $this->addError("Username allready taken.", $field);
              return false;
          }

          return true;
      }


      public function checkPassword($value, $field)
      {
          if (empty($value)) {
              $this->addError("Password is required.", $field);
              return false;
          } else {
              //at least one uppercase letter
              //at least one lowercase letter
              //at least one digit
              //minimum 6 chars
              $regexp = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/";

              if (!preg_match($regexp, $value)) {
                  $this->addError("Password does not fulfills requirements.", $field);
                  return false;
              }
          }

          return true;
      }
    /**
     * Check if password $value is equal $match.
     * @param  string $value value to check.
     * @param  string $match value to compare.
     * @param  string $field input field name.
     * @return bool        true if succeed,false otherwise.
     */
    public function assertEquals($value, $match, $field)
    {
        if (empty($value)) {
            $this->addError("Password confirm is required.", $field);
            return false;
        } else {
            if ($value !== $match) {
                $this->addError("Passwords does not match.", $field);
                return false;
            }
        }
        return true;
    }
      /**
       * Check if email is in correct format.
       * @param  string $value email
       * @param  string $field input name
       * @return boolean        true if its correct false otherwise
       */
      public function checkEmail($value, $field)
      {
          if (empty($value)) {
              $this->addError("Email is required.", $field);
              return false;
          }
          //valid format
          if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
              $this->addError("Invalid email format.", $field);
              return false;


          }
          //uniqe value
          $getEmail = DB::getInstance()->query("SELECT * FROM `members` WHERE `email` = :email", array(":email"=>$value));

          if($getEmail->count() > 0){

            $this->addError("Email is allready in use.",$field);
            return false;

          }
          return true;
      }
      public function addError($error, $field)
      {
          if (empty($this->_errors[$field])) {
              $this->_errors[$field] = array(generate_html_error($error));
          } else {
              $this->_errors[$field][] = generate_html_error($error);
          }
      }
      /**
       * Display error depends on field.
       * @param  string $field input field name
       * @return string        display
       */
      public function displayError($field)
      {
          $errors = "";

          if (!empty($this->_errors[$field])) {
              foreach ($this->_errors[$field] as $error) {
                  $errors .= $error;
              }
          }

          return $errors;
      }
      /**
       * count validation errors
       * @return int errors amount.
       */
      public function countErrors()
      {
          return count($this->_errors);
      }
  }
