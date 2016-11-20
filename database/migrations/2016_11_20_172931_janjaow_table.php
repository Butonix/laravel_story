<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JanjaowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name')->unique();
            $table->timestamps();
        });
        Schema::create('facebook_login', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook_user_id');
            $table->string('full_name');
            $table->string('email');
            $table->timestamps();
        });
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('story', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('story_name');
            $table->string('story_author');
            $table->string('category_name');
            $table->longText('story_outline');
            $table->string('story_picture');
            $table->tinyInteger('state_comment');
            $table->tinyInteger('state_public');
            $table->timestamps();
        });
        Schema::create('tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id');
            $table->string('tag1')->nullable();
            $table->string('tag2')->nullable();
            $table->string('tag3')->nullable();
            $table->string('tag4')->nullable();
            $table->string('tag5')->nullable();
            $table->timestamps();
        });
        Schema::create('visit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id');
            $table->integer('view');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category');
        Schema::drop('facebook_login');
        Schema::drop('member');
        Schema::drop('story');
        Schema::drop('tag');
        Schema::drop('visit');
    }
}
