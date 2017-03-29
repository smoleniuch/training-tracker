<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;
use Faker\Factory;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Profile $profile)
    {

      $userAmount = 500;
      $faker = Faker\Factory::create();
      DB::table('users_profiles')->delete();
      $profile->insert(array(

        "user_id" => 1,
        "username" => "Janko",
        "full_name" => "Janko Muzykant",
        'age'  => '25',
        'gender' => 'Male',
        'location' => 'Wietnam City',
        'email' => 'jan_13@o2.pl',
        'avatars_path' => 'storage/images/avatars/default-avatar.jpeg'

      ));

      for($i = 0; $i < $userAmount ; $i++){

        $profile->insert(array(


          "username" => $faker->username,
          "full_name" => $faker->name,
          'age'  => $faker->numberBetween(13,115),
          'gender' => $faker->randomElement(array('male','female')),
          'location' => $faker->address,
          'email' => $faker->email,
          'avatars_path' => $faker->imageUrl($width = 640, $height = 480),
          'about_me' => $faker->text(800)

        ));


      }

    }

}
