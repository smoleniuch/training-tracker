<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Services\FriendService;

use Illuminate\Http\Request;

class FriendsController extends Controller
{
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
        $userId = auth()->user()->id;

        $friends = FriendService::getUserFriendsList($userId);
        $groups = FriendService::getUserFriendsGroups($userId);

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
    public function show()
    {
        $userId = auth()->user()->id;

        $friends = FriendService::getUserFriendsList($userId);
        $groups = FriendService::getUserFriendsGroups($userId);

        return view('pages.friends.view',[

          'friends' => $friends,
          'groups'  => $groups

        ]);
    }

    /**
     * Generate user rows from specified group.
     * This method let change displayed user list without reloading page
     * AJAX request. Check public/js/friendsPageJquery.js
     *
     * @return \Illuminate\Http\Response
     */
    public function getFriendsRows($group = 'All')
    {
        $userId = auth()->user()->id;

        $friends = FriendService::getUserFriendsList($userId,$group);

        return FriendService::generateFriendListRows($friends);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
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
