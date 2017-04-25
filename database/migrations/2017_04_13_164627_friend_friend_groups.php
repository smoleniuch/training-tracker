<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FriendFriendGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend_friend_groups',function(Blueprint $table){

          $table->unsignedInteger('friend_id')->nullable();
          $table->unsignedInteger('friend_group_id')->nullable();
          $table->primary(['friend_id','friend_group_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friend_friend_groups');
    }
}
