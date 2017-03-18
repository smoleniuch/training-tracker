<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Repositories\UserRepository;

class UserComposer {

  public $loggedUserAvatar;

  public function __construct(UserRepository $user){

    $this->loggedUserAvatar = $user->getloggedUserAvatar();

  }

  public function loggedUserAvatar(View $view){

    $view->with([

      'loggedUserAvatarPath' => $this->loggedUserAvatar

    ]);

  }

}
