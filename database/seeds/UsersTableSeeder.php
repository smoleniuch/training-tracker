<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        DB::table('users')->delete();
        User::create(array(

          'username' => 'janko',
          'email' => 'jan_13@o2.pl',
          'password' => Hash::make('0ac0b6'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()));


    }
}
