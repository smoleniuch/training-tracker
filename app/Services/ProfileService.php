<?php
namespace App\Services;

use App\Models\Profile;

class ProfileService {

  protected $profileModel;

  /**
   *
   * @param Profile $profile Eloquent model
   */
  public function __construct(Profile $profile){

    $this->profileModel = $profile;

  }



}
