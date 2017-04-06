<?php
namespace App\Services;

use App\Models\User;

class UserSearchEngineService {

  private $userModel;

  public function __construct(User $userModel){

    $this->userModel = $userModel;

  }

  public function findUserByUsername($searchValue,$offset = 0,$amount = 15){

    //first find where search value is at the begining.
    // $users = 

    return $this->userModel::where('username','regexp',$searchValue)->offset($offset)
                                                                    ->limit($amount)
                                                                    ->get();


  }

}
