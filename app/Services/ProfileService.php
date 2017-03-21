<?php
namespace App\Services;

use App\Models\Profile;
use App\Http\Requests\UpdateUserProfile as Request;
use Illuminate\Http\Response;

class ProfileService {

  protected $profileModel;
  protected $updateUserProfileRequest;
  /**
   *
   * @param Profile $profile Eloquent model
   */
  public function __construct(Profile $profile,Request $request){

    $this->profileModel = $profile;
    $this->request = $request;
  }

  /**
   * Update user profile
   * If $id is not specified update currently logged user.
   * @param  int $id profile id
   * @return [type]     [description]
   */
  public function updateProfile($id = null){

    dd($this->request);
    $id = $id === null?auth()->user()->id:$id;
    $profile = $this->profileModel::find($id);


  }



}
