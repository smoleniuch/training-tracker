<?php

namespace App\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table = 'users_profiles';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [

      'user_id',
      'age',
      'about_me',
      'avatars_path',
      'email',
      'gender',
      'location',
      'username'


    ];

    public function user(){

      return $this->belongsTo('User','id','user_id');

    }



}
