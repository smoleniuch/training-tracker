<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Profile;

class Friend extends Model
{
    public function user(){

      $this->belongsTo('User');

    }

    public function profile(){

      return $this->belongsTo(Profile::class,'profile_id','user_id');

    }
}
