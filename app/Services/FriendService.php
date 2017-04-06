<?php

namespace App\Services;

use App\Models\Friend;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;

class FriendService {


  /**
   * Get all users friends in specified group.
   * @param  int  $id users id for whom group will be loaded
   * @param  string $group friends group
   * @return Collection        Collection of App\Models\Friend .
   */
  public function getUserFriendsFromGroup($id,$group){

    if($group == 'All'){

      $friends = $this->getAllUserFriends($id);

    }
    else{

      $friends = User::find($id)->friends->where('group',$group);

    }
    // dd(Friend::find(2)->profile);


    return $friends;

  }
  public function getAllUserFriends($id){

    // dd(Friend::find(2)->profile);
    $friends = User::find($id)->friends->unique('profile_id');

    return $friends;

  }
  /**
   * Return all specified friends group,for user with $id.
   * @param  int $id user id
   * @return  Collection    all users friends groups.
   */
  public function getUserFriendsGroups($id){


    $groups = User::find($id)->friends()
                             ->get()
                             ->pluck('group')
                             ->unique()
                             ->sort();

    return $groups;

  }
  /**
   * generate rows from $friends Collection
   * @param  Collection of App\Models\Friend $friends
   * @return View          [description]
   */
  public function generateFriendListRows(Collection $friends){

    return view('components.friends.rows')->with('friends',$friends);

  }

  /**
   * Generate found user rows
   * @param  Collection $foundUsers user that were found
   * @return View                 found user rows
   */
  public function generateSearchedNewFriendsRows(Collection $foundUsers){
    
    return view('components.friends.searched-user-rows')->with('users',$foundUsers);

  }



}
