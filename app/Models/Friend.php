<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Profile;
use App\Models\FriendGroups;

class Friend extends Model
{
    public function user(){

    return  $this->belongsTo(User::class);

    }

    public function profile(){

      return $this->hasOne(Profile::class,'user_id','friends_id');

    }

    public function friendGroup(){

      return $this->belongsToMany(FriendGroups::class,'friend_friend_groups','friend_id','friend_group_id');

    }
}
