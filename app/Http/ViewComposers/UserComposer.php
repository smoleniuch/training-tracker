<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Repositories\UserRepository;
use App\Services\ProfileService;

class UserComposer {

  private $loggedUserAvatar;
  private $profileService;

  public function __construct(UserRepository $user,ProfileService $profileService){

    $this->loggedUserAvatar = $user->getloggedUserAvatar();
    $this->profileService = $profileService;

  }

  public function loggedUserAvatar(View $view){

    $view->with([

      'loggedUserAvatarPath' => $this->loggedUserAvatar

    ]);

  }

  public function userProfileData(View $view){

    $profileData = $this->profileService->getProfileData();
    
    $view->with($profileData);

  }

}
