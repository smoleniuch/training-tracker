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

}

 ?>
