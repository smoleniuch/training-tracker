<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Http\Request;
// use App\Http\Requests\UpdateUserProfile;
use Illuminate\Http\Response;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    protected $profileService;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(ProfileService $profileService)
  {

      // $this->middleware('auth');
      $this->profileService =  $profileService;
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Profile $profile, $credentials)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Profile $profile, $credentials)
    {
        $profile->insert($credentials);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $user_id)
    {
        $profileData = $user_id->toArray();


        return view('pages.profile.show', $profileData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('pages.settings.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        
        $id = auth()->user()->id;

        $this->profileService->updateProfile($id);

        session()->flash('settingsMessage', 'Profile has been updated');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
