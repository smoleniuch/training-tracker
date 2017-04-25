<?php

use Illuminate\Database\Seeder;
use App\Models\FriendGroups;
use Faker\Factory as Faker;

class FriendsGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(FriendGroups $friendGroups)
    {
        $faker = Faker::create();
        DB::table('friend_groups')->delete();

        $collection = collect(['Team','School','Boxing','Family'])->sort();

        //janko
        $collection->each(function ($group) use ($friendGroups) {
            $friendGroups->insert(array(

            "user_id" => 1,
            "name" => $group

          ));
        });
    }
}
