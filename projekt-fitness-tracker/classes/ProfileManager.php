<?php

class ProfileManager{

  public static function createProfile($data){

    $userID = $data["id"];
    $userAvatar = Config::get("profile/default-avatar");

    $stmt = "INSERT INTO `users_profiles` (`user_id`, `user_avatar`) VALUES (:id, :avatar)";
    $params = array(

      ":id" => $userID,
      ":avatar" => $userAvatar

    );

    $addProfile = DB::getInstance()->query($stmt,$params);


    if(!$addProfile->error()){

      return true;

    }

    return false;
  }
  /**
   * Returns associative array with profile data.
   * @param  int $id users id
   * @return associative array  or false   if it finds user fetch data.
   */
  public static function getProfileData($id){

    $db = DB::getInstance();

    $db->query("SELECT * FROM `users_profiles` WHERE `user_id` = :id",array(":id" => $id),PDO::FETCH_ASSOC);

    if(!empty($db->result())){

      return $db->result()[0];

    }
    return false;


  }

}

 ?>
