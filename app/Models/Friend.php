<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Profile;

class Friend extends Model
{
    public function user(){

    return  $this->belongsTo(User::class);

    }

    public function profile(){

      return $this->hasOne(Profile::class,'user_id','profile_id');

    }
}
