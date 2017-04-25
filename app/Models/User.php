<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Profile;
use App\Models\Friend;
use App\Models\FriendGroups;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){

      return $this->hasOne(Profile::class,'user_id','id');

    }

    public function friends(){

      return $this->hasMany(Friend::class,'user_id');

    }

    public function friendGroups(){

      return $this->hasMany(FriendGroups::class,'user_id');

    }
}
