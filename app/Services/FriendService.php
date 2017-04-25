<?php

namespace App\Services;

use App\Models\Friend;
use App\Models\User;
use App\Models\FriendGroups;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;

class FriendService {



  public function __construct(){



  }
  /**
   * Get all users friends in specified group.
   * @param  int  $id users id for whom group will be loaded
   * @param  string $group friends group
   * @return Collection        Collection of App\Models\Friend .
   */
  public function getUserFriendsFromGroup($id,$group){

    if($group === 'All'){

      return self::getAllUserFriends($id);

    }

    return User::find($id)->friendGroups
                          ->where('name','=',$group)
                          ->first()
                          ->friends;

  }
  /**
   * Return all friends
   * @param  int $id user id
   * @return Collection     of App\Models\Friend
   */
  public function getAllUserFriends($id){


    $friends = User::find($id)->friends;

    return $friends;

  }
  /**
   * Return all specified friends group,for user with $id.
   * @param  int $id user id
   * @return  Collection    of App\Models\FriendGroups.
   */
  public function getUserFriendsGroups($id){


    $groups = User::find($id)->friendGroups;

    return $groups;

  }
  /**
   * generate list from $friends Collection
   * @param  Collection of App\Models\Friend $friends
   * @return View
   */
  public function generateViewFriendRows(Collection $friends){

    return view('components.friends.view-friend-rows',compact('friends'));

  }
  public function generateManageFriendRows(Collection $friends){

    return view('components.friends.manage-friend-rows',compact('friends'));

  }
  public function generateManageList($userId){

    $friendGroups = $this->getUserFriendsGroups($userId);
    $allFriends = $this->getAllUserFriends($userId);


    return view('pages.friends.manage',[

      'groups' => $friendGroups,
      'friends' => $allFriends

    ]);

  }
  /**
   * Generate found user rows
   * @param  Collection $users App\Models\User;
   * @return View                With found user rows
   */
  public function generateSearchedNewFriendsRows(Collection $users){


    return view('components.friends.search-user-rows',compact('users'));

  }



}
