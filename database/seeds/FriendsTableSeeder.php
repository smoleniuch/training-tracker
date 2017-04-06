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
        $userAmount = 50;
        DB::table('friends')->delete();

      for ($i=2; $i <$userAmount ; $i++) {

        $friend->insert(array(

          'belongs_to_user_id' => 1,
          'group' => $faker->randomElement(array('Boxing','Family','School')),
          'profile_id' => $i

        ));

      }

    }
}
