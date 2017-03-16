<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('users_profiles', function (Blueprint $table) {

            $table->integer('user_id')->primary();
            $table->char('username')->nullable();
            $table->string('email')->nullable();
            $table->string('full_name')->nullable();
            $table->string('location')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('about_me')->nullable();
            $table->string('avatars_path')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

            Schema::dropIfExists('users_profiles');

    }
}
