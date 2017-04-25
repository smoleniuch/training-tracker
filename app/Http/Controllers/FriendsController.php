<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Services\FriendService;
use App\Services\UserSearchEngineService;

use Illuminate\Http\Request;

class FriendsController extends Controller
{

    private $friendService,
            $userId;


    public function __construct(FriendService $friendService){

      $this->friendService = $friendService;
      $this->userId = auth()->user()->id;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource,user friends page with friends from group "All".
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $friends = $this->friendService->getAllUserFriends($this->userId);
        $groups = $this->friendService->getUserFriendsGroups($this->userId);

        return view('pages.friends.view',[

          'friends' => $friends,
          'groups'  => $groups

        ]);
    }

    /**
     * Display the specified resource,user friends find page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showFindFriends()
    {

        return view('pages.friends.find');

    }
    /**
     * Get users records
     * @param  Request                 $request
     * @param  UserSearchEngineService $userBrowser
     * @return View                               user list items
     */
    public function getSearchedUserRows(Request $request,UserSearchEngineService $userBrowser){

      $searchValue = $request->searchValue;
      $offset = $request->offset;
      $amount = $request->amount;

      $users = $userBrowser->findUserByUsername($searchValue,$offset,$amount);

      return $this->friendService->generateSearchedNewFriendsRows($users);

    }

    /**
     * Generate user rows from specified group.
     * This method let change displayed user list without reloading page
     * AJAX request. Check public/js/friendsPageJquery.js
     *
     * @return \Illuminate\Http\Response
     */
    public function getFriendsList($group)
    {

        $friends = $this->friendService->getUserFriendsFromGroup($this->userId,$group);

        return $this->friendService->generateViewFriendRows($friends);
    }

    public function getManageFriendsList($group)
    {

        $friends = $this->friendService->getUserFriendsFromGroup($this->userId,$group);

        return $this->friendService->generateManageFriendRows($friends);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function showManage(Friend $friend)
    {

        return $this->friendService->generateManageList($this->userId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }
}
