<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('FriendsTableSeeder');
        $this->call('FriendsGroupTableSeeder');
        $this->call('FriendsFriendsGroupPivotTableSeeder');
    }
}
