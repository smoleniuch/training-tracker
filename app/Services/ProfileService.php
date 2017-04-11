<?php
namespace App\Services;

use App\Models\Profile;
use App\Http\Requests\UpdateUserProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AvatarService;
use Illuminate\Support\Facades\Storage;

class ProfileService {

  protected $profileModel;
  protected $updateRequest;
  protected $avatarService;


  public function __construct(Profile $profile,UpdateUserProfile $updateRequest,AvatarService $avatarService){

    $this->profileModel = $profile;
    $this->updateRequest = $updateRequest;
    $this->avatarService = $avatarService;

  }

  /**
   * Update user profile
   * @param  int $id profile id
   * @return [type]     [description]
   */
  public function updateProfile($id){


    $profileDataToUpdate = $this->updateRequest->except('avatar');

    //set gender as empty string if gender is not specified.
    if(empty($profileDataToUpdate['gender'])){

      $profileDataToUpdate['gender'] = '';

    }
    //change avatar if its specified.
    if($avatarFile = $this->updateRequest->file('avatar')){

      $currentAvatarPath = $this->profileModel::find($id)->avatars_path;
      $avatarPath = $this->avatarService->replace($avatarFile,$currentAvatarPath);
      $profileDataToUpdate['avatars_path'] = $avatarPath;

    }


    $profile = $this->profileModel::find($id);

    $profile->fill($profileDataToUpdate);
    
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
  public function getProfileData($id){

    //if id is not specified get id of user that are logged in.


    $profileData = $this->profileModel::find($id)->toArray();

    return $profileData;

  }


}
