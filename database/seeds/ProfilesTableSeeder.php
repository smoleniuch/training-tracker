<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Profile $profile)
    {
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

    }
}
