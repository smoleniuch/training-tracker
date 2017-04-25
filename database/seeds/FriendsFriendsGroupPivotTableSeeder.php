<?php

use Illuminate\Database\Seeder;
use App\Models\FriendFriendGroup;
use App\Models\User;
class FriendsFriendsGroupPivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //set friends to groups for first user.
      DB::table('friend_friend_groups')->delete();

      $groupsIDs = User::find(1)->friendGroups->pluck('id');
      $friendsIDs = User::find(1)->friends->pluck('id');

      for($i = 0;$i < 250;$i++){

        $randFriendID = $friendsIDs->random();
        $randGroupID = $groupsIDs->random();
        //if record allready exsists
        $recordExists = FriendFriendGroup::where([

          ['friend_id','=',$randFriendID],
          ['friend_group_id','=',$randGroupID]

        ])->first() !== null;


        if(! $recordExists){

          FriendFriendGroup::insert(array(

            'friend_id' => $randFriendID,
            'friend_group_id' => $randGroupID

          ));

        }
      }


    }
}
