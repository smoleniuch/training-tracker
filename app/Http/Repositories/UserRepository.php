<?php

namespace App\Http\Repositories;

class UserRepository {

  public function getLoggedUserAvatar(){

    
    return auth()->user()->profile->avatars_path ;

  }

}
