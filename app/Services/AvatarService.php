<?php

namespace App\Services;

use App\Http\Requests\UpdateUserProfile;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class AvatarService {

  //paths where avatars are stored
  public $pathToAvatars;

  /**
   * Remove current avatar file if its not default avatar.
   * Add uploaded one.
   * @param  UploadedFile $file              avatar file
   * @param  string       $currentAvatarPath avatar path
   * @return string                          path to new avatar
   */
  public static function replace(UploadedFile $file,$currentAvatarPath){

    if($currentAvatarPath !== config('user.profile.defaultAvatar')){

      Storage::delete($currentAvatarPath);

    }

    return self::upload($file);

  }

  /**
   * Upload new avatar
   * @param  UploadedFile $file avatar file
   * @return string             path to avatar
   */
  public static function upload(UploadedFile $file){

    $pathToAvatars = config('paths.avatars');

    $path = $file->store($pathToAvatars);

    return $path;

  }

}
