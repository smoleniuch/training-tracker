<?php

namespace App\Services;

use App\Models\Friend;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;

class FriendService {


  /**
   * Get all users friends profiles in specified group.
   * @param  int  $id users id for whom group will be loaded
   * @param  string $group friends group
   * @return Collection        Collection of App\Models\Friend .
   */
  public static function getUserFriendsList($id,$group = 'All'){

    $friends = User::find($id)->friends()->where('group',$group)->get();

    return $friends;

  }
  /**
   * Return all specified friends group,for user with $id.
   * @param  int $id user id
   * @return  Collection    all users friends groups.
   */
  public static function getUserFriendsGroups($id){


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
  public static function generateFriendListRows(Collection $friends){

    return view('components.friends.rows')->with('friends',$friends);

  }

  // public static function generateFriendList()



}
