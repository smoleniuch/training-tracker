<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $faker = Faker::create();
        $usersAmount = 500;

        DB::table('users')->delete();

        User::create(array(

          'username' => 'janko',
          'email' => 'jan_13@o2.pl',
          'password' => Hash::make('0ac0b6'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()));

      for ($i=0; $i < $usersAmount; $i++) {

        User::create(array(

          'username' => $faker->username,
          'email' => $faker->email,
          'password' => $faker->word,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()

        ));


      }


    }
}
