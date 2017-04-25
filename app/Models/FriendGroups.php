<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Friend;

class FriendGroups extends Model
{
  public function friends(){

    return $this->belongsToMany(Friend::class,'friend_friend_groups','friend_group_id','friend_id');

  }
}
