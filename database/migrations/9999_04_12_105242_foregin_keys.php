<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeginKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


      Schema::table('friends',function(Blueprint $table){

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


      });

      Schema::table('friend_groups',function(Blueprint $table){

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


      });

      Schema::table('users_profiles',function(Blueprint $table){

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('friends',function(Blueprint $table){

        $table->dropForeign('friends_user_id_foreign');

      });

      Schema::table('friend_groups',function($table){

        $table->dropForeign('friend_groups_user_id_foreign');

      });

      Schema::table('users_profiles',function($table){

        $table->dropForeign('users_profiles_user_id_foreign');

      });
    }
}
