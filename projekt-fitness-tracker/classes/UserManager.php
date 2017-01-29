<?php

  class UserManager
  {


    /**
     * Insert user into database.
     * @param  array  $user associative array with keys: ":username",":password",":email",":joined",":level"
     *
     * @return [type]       [description]
     */
    public static function create($user = array())
    {



          //add user
      $addUser = "INSERT INTO `members` (`id`, `username`, `password`, `email`, `joined`, `level`)
                                    VALUES (NULL, :username, :password, :email, :joined, :level)";

        $parameters = array(":username" => $user["username"],
                          ":password" => Hash::make($user["password"]),
                          ":email" => $user["email"],
                          ":joined" => $user["joined"],
                          ":level" => $user["level"]);

        if (DB::getInstance()->query($addUser, $parameters)->error()) {
            throw new Exception("Sorry registration is not available");
        }
        //add profile
        $id = UserManager::getUserData($user["email"])->id;
        $profileData = array(

          "id" => $id

        );
        if (ProfileManager::createProfile($profileData)) {
            return true;
        } else {
            throw new Exception("Sorry registration is not available");
            return false;
        }
    }
    /**
     * Get user data from database by email or id.
     * @param  string or number $email email or id
     * @return object       fetched object from database.
     */
    public static function getUserData($value)
    {
        if (self::userExists($value)) {

        //id
        if (is_numeric($value)) {
            $getUserSQL = "SELECT * FROM `members` WHERE `id` = :id ";
            $params = array(":id" => $value);
        }
        //email
        else {
            $getUserSQL = "SELECT * FROM `members` WHERE `email` = :email ";
            $params = array(":email" => $value);
        }


            $userData = DB::getInstance()->query($getUserSQL, $params);
          //var_dump($userData);
          return $userData->result()[0];
        }

        return false;
    }
    /**
     * check if user exists in database;
     * @param  string $value user ID or Email
     * @return boolean       true if exists false otherwise
     */
    public static function userExists($value)
    {

      //search by ID
      if (is_numeric($value)) {
          $user = DB::getInstance()->query("SELECT 'id' FROM `members` WHERE `id` = :id", array(

          ":id" => $value

        ));
      }
      //search by email
      else {
          $user = DB::getInstance()->query("SELECT 'email' FROM `members` WHERE `email` = :email", array(

          ":email" => $value

        ));
      }

        if ($user->result()) {
            return true;
        }

        return false;
    }
    /**
     * Checkes if password matches password from database.
     * @param  string $email    input email
     * @param  string $password input password
     * @return boolean           true if match false otherwise.
     */
    public static function checkPassword($email, $password)
    {
        if (self::userExists($email)) {
            $databasePassword = self::getUserData($email)->password;

            return password_verify($password, $databasePassword);
        }

        return false;
    }
  }
