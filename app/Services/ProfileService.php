<?php
namespace App\Services;

use App\Models\Profile;
use App\Http\Requests\UpdateUserProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileService {

  protected $profileModel;
  protected $updateRequest;
  /**
   *
   * @param Profile $profile Eloquent model
   */
  public function __construct(Profile $profile,UpdateUserProfile $updateRequest){
    // dd($updateRequest);
    $this->profileModel = $profile;
    $this->updateRequest = $updateRequest;
  }

  /**
   * Update user profile
   * If $id is not specified update currently logged user.
   * @param  int $id profile id
   * @return [type]     [description]
   */
  public function updateProfile($id){


    

    $profile = $this->profileModel::find($id);

    $profile->fill($this->updateRequest->all());

    $profile->save();


  }
  /**
   * Get users profile credentials
   *
   * if $id is not specified get credentials of currently logged user.
   *
   * @param  int $id profile id
   * @return array     profile data
   */
  public function getProfileData($id = null){

    //if id is not specified get id of user that are logged in.
    $id = $id === null?auth()->user()->id:$id;

    $profileData = $this->profileModel::find($id)->toArray();

    return $profileData;

  }


}
