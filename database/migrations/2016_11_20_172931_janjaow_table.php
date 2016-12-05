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
            $table->integer('visit');
            $table->integer('love');
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
        Schema::create('give_love', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id');
            $table->string('username');
            $table->tinyInteger('status');
            $table->timestamps();
        });
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id');
            $table->string('story_name');
            $table->string('username');
            $table->string('comment_detail');
            $table->timestamps();
        });
        Schema::create('announce', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('announce_title');
            $table->string('announce_detail');
            $table->tinyInteger('state_comment');
            $table->timestamps();
        });
        Schema::create('account_truemoney', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('tmCode');
            $table->timestamps();
        });
        Schema::create('truemoney', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tmCode');
            $table->string('tmMsg');
            $table->string('tmAmount');
            $table->string('tmRealAmount');
            $table->tinyInteger('tmStatus');
            $table->string('created_at');
        });
        Schema::create('used_truemoney', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tmCode');
            $table->string('created_at');
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
        Schema::drop('give_love');
        Schema::drop('comment');
        Schema::drop('announce');
        Schema::drop('account_truemoney');
        Schema::drop('truemoney');
        Schema::drop('used_truemoney');
    }
}
