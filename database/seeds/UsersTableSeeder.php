<?php

use App\Models\User;
use App\Models\Profile;
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
        DB::table('users_profiles')->delete();

        User::create(array(

          'username' => 'janko',
          'email' => 'jan_13@o2.pl',
          'password' => Hash::make('0ac0b6'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()));

        Profile::create(array(

          "username" => 'janko',
          "full_name" => $faker->name,
          'age'  => $faker->numberBetween(13,115),
          'gender' => $faker->randomElement(array('male','female')),
          'location' => $faker->address,
          'email' => 'jan_13@o2.pl',
          'avatars_path' => $faker->imageUrl($width = 640, $height = 480),
          'about_me' => $faker->text(800)

        ));
      for ($i=0; $i < $usersAmount; $i++) {

        $username = $faker->username;
        $email = $faker->email;
        $password = $faker->word;

        User::create(array(

          'username' => $username,
          'email' => $email,
          'password' => $password,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()));

        Profile::create(array(

          "username" => $username,
          "full_name" => $faker->name,
          'age'  => $faker->numberBetween(13,115),
          'gender' => $faker->randomElement(array('male','female')),
          'location' => $faker->address,
          'email' => $email,
          'avatars_path' => $faker->imageUrl($width = 640, $height = 480),
          'about_me' => $faker->text(800)

        ));




      }


    }
}
