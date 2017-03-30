<?php

use Illuminate\Database\Seeder;
use App\Models\Friend;
use Faker\Factory as Faker;
class FriendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Friend $friend)
    {
        $faker = Faker::create();
        $userAmount = 500;
        DB::table('friends')->delete();

      for ($i=0; $i <$userAmount ; $i++) {

        $friend->insert(array(

          'user_id' => $faker->numberBetween(1,50),
          'group' => $faker->randomElement(array('All','Family','School')),
          'profile_id' => $i

        ));

      }

    }
}
