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

  public function loggedUserProfileData(View $view){

    $currentUserId = auth()->user()->id;
    $profileData = $this->profileService->getProfileData($currentUserId);

    $view->with($profileData);

  }

}
