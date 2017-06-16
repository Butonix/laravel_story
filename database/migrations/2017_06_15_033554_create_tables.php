<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
//    /**
//     * Run the migrations.
//     *
//     * @return void
//     */
    public function up()
    {
//
//        /* First Important */
//        Schema::create('member', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('username');
//            $table->string('facebook_id')->nullable();
//            $table->string('author')->nullable();
//            $table->string('image')->nullable();
//            $table->string('email');
//            $table->string('password');
//            $table->string('text_password', 500);
//            $table->unsignedTinyInteger('status_ban');
//            $table->rememberToken();
//            $table->timestamps();
//        });
//
//        Schema::create('category', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('category_name');
//            $table->unsignedTinyInteger('status_alert');
//            $table->timestamps();
//        });
//
//        Schema::create('story', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('member_id');
//            $table->unsignedInteger('category_id');
//            $table->string('story_name');
//            $table->string('story_author');
//            $table->longText('story_outline');
//            $table->string('story_picture');
//            $table->unsignedTinyInteger('status_ban');
//            $table->unsignedTinyInteger('status_public');
//            $table->unsignedTinyInteger('status_comment');
//            $table->unsignedInteger('count_visitor');
//            $table->unsignedInteger('count_like');
//            $table->timestamps();
//
//            $table->foreign('category_id')
//                ->references('id')->on('category')
//                ->onDelete('cascade');
//
//            $table->foreign('member_id')
//                ->references('id')->on('member')
//                ->onDelete('cascade');
//        });
//
//        Schema::create('sub_story', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('story_id');
//            $table->string('story_name');
//            $table->longText('story_outline');
//            $table->unsignedTinyInteger('status_ban');
//            $table->unsignedTinyInteger('status_public');
//            $table->unsignedTinyInteger('status_comment');
//            $table->unsignedInteger('unlock_coin');
//            $table->unsignedInteger('unlock_diamond');
//            $table->unsignedInteger('count_visitor');
//            $table->unsignedInteger('count_like');
//            $table->timestamps();
//
//            $table->foreign('story_id')
//                ->references('id')->on('story')
//                ->onDelete('cascade');
//        });
//        /* ========== */
//
//        Schema::create('about_us', function (Blueprint $table) {
//            $table->increments('id');
//            $table->longText('detail');
//            $table->timestamps();
//        });
//
//        Schema::create('administrator', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('username');
//            $table->string('password');
//            $table->rememberToken();
//            $table->timestamps();
//        });
//
//        Schema::create('announce', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('member_id');
//            $table->string('announce_title');
//            $table->string('announce_detail');
//            $table->tinyInteger('status_comment');
//            $table->timestamps();
//
//            $table->foreign('member_id')
//                ->references('id')->on('member')
//                ->onDelete('cascade');
//        });
//
//        Schema::create('banner', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('banner_file')->nullable();
//            $table->longText('banner_detail')->nullable();
//            $table->timestamps();
//        });
//
//        Schema::create('contact', function (Blueprint $table) {
//            $table->increments('id');
//            $table->longText('contact_detail');
//            $table->timestamps();
//        });
//
//        Schema::create('device_login', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('username');
//            $table->ipAddress('ip_address');
//            $table->timestamps();
//        });
//
//        Schema::create('history_cashcard', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('member_id');
//            $table->string('transaction');
//            $table->string('response_code');
//            $table->string('response_desc');
//            $table->string('cashcard_no');
//            $table->string('amount');
//            $table->string('status');
//            $table->timestamps();
//        });
//
//        Schema::create('how_to_diamond', function (Blueprint $table) {
//            $table->increments('id');
//            $table->longText('detail');
//            $table->timestamps();
//        });
//
//        Schema::create('how_to_unlock_story', function (Blueprint $table) {
//            $table->increments('id');
//            $table->longText('detail');
//            $table->timestamps();
//        });
//
//        Schema::create('member_money', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('member_id');
//            $table->unsignedInteger('cash')->nullable();
//            $table->unsignedInteger('diamond')->nullable();
//            $table->timestamps();
//
//            $table->foreign('member_id')
//                ->references('id')->on('member')
//                ->onDelete('cascade');
//        });
//
//        Schema::create('profile_comment', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('member_id');
//            $table->longText('comment_detail');
//            $table->timestamps();
//
//            $table->foreign('member_id')
//                ->references('id')->on('member')
//                ->onDelete('cascade');
//        });
//
//        Schema::create('register_writer', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('member_id');
//            $table->string('full_name');
//            $table->string('id_card', 13);
//            $table->string('address');
//            $table->string('tel');
//            $table->string('bank_name');
//            $table->string('bank_sub_branch');
//            $table->string('bank_account_number');
//            $table->string('bank_account_name');
//            $table->unsignedTinyInteger('status_confirm');
//            $table->unsignedTinyInteger('status_reject');
//            $table->timestamps();
//
//            $table->foreign('member_id')
//                ->references('id')->on('member')
//                ->onDelete('cascade');
//        });
//
//        Schema::create('report_visitor', function (Blueprint $table) {
//            $table->increments('id');
//            $table->ipAddress('ip_address');
//            $table->timestamps();
//        });
//
//        Schema::create('rules', function (Blueprint $table) {
//            $table->increments('id');
//            $table->longText('detail')->nullable();
//            $table->timestamps();
//        });
//
//        Schema::create('story_comment', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('story_id');
//            $table->unsignedInteger('member_id');
//            $table->longText('comment_detail');
//            $table->timestamps();
//
//            $table->foreign('story_id')
//                ->references('id')->on('story')
//                ->onDelete('cascade');
//        });
//
//        Schema::create('sub_story_comment', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('sub_story_id');
//            $table->unsignedInteger('member_id');
//            $table->longText('comment_detail');
//            $table->timestamps();
//
//            $table->foreign('sub_story_id')
//                ->references('id')->on('sub_story')
//                ->onDelete('cascade');
//        });
//
//        Schema::create('reply_comment_story', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('story_comment_id');
//            $table->unsignedInteger('member_id');
//            $table->longText('comment_detail');
//            $table->timestamps();
//
//            $table->foreign('story_comment_id')
//                ->references('id')->on('story_comment')
//                ->onDelete('cascade');
//        });
//
//        Schema::create('reply_comment_sub_story', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('sub_story_comment_id');
//            $table->unsignedInteger('member_id');
//            $table->longText('comment_detail');
//            $table->timestamps();
//
//            $table->foreign('sub_story_comment_id')
//                ->references('id')->on('sub_story_comment')
//                ->onDelete('cascade');
//        });
//
//        Schema::create('tag', function (Blueprint $table) {
//            $table->unsignedInteger('story_id');
//            $table->string('tag1')->nullable();
//            $table->string('tag2')->nullable();
//            $table->string('tag3')->nullable();
//            $table->string('tag4')->nullable();
//            $table->string('tag5')->nullable();
//            $table->timestamps();
//
//            $table->primary('story_id');
//            $table->foreign('story_id')
//                ->references('id')->on('story')
//                ->onDelete('cascade');
//        });
//
//        Schema::create('unlock_sub_story', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('member_id');
//            $table->unsignedInteger('sub_story_id');
//            $table->timestamps();
//        });
    }
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
    public function down()
    {
//        Schema::disableForeignKeyConstraints();
//
//        Schema::dropIfExists('about_us');
//        Schema::dropIfExists('administrator');
//        Schema::dropIfExists('member');
//        Schema::dropIfExists('announce');
//        Schema::dropIfExists('banner');
//        Schema::dropIfExists('category');
//        Schema::dropIfExists('contact');
//        Schema::dropIfExists('device_login');
//        Schema::dropIfExists('history_cashcard');
//        Schema::dropIfExists('how_to_diamond');
//        Schema::dropIfExists('how_to_unlock_story');
//        Schema::dropIfExists('member_money');
//        Schema::dropIfExists('profile_comment');
//        Schema::dropIfExists('register_writer');
//        Schema::dropIfExists('reply_comment_story');
//        Schema::dropIfExists('reply_comment_sub_story');
//        Schema::dropIfExists('report_visitor');
//        Schema::dropIfExists('rules');
//        Schema::dropIfExists('story');
//        Schema::dropIfExists('story_comment');
//        Schema::dropIfExists('sub_story');
//        Schema::dropIfExists('sub_story_comment');
//        Schema::dropIfExists('tag');
//        Schema::dropIfExists('unlock_sub_story');
    }
}
