<?php

namespace App\Http\Repositories;

class UserRepository {

  public function getLoggedUserAvatar(){

    if(isset(auth()->user()->profile->avatars_path)){

      return auth()->user()->profile->avatars_path ;

    }
    else{

      return 'Not found';

    }


  }

}
