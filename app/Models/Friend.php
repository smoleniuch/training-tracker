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

      return $this->belongsTo(Profile::class,'profile_id','belongs_to_user_id');

    }
}
