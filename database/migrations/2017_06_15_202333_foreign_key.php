<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('story', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')->on('category')
                ->onDelete('cascade');
            $table->foreign('member_id')
                ->references('id')->on('member')
                ->onDelete('cascade');
        });

        Schema::table('sub_story', function (Blueprint $table) {
            $table->foreign('story_id')
                ->references('id')->on('story')
                ->onDelete('cascade');
        });

        Schema::table('announce', function (Blueprint $table) {
            $table->foreign('member_id')
                ->references('id')->on('member')
                ->onDelete('cascade');
        });

        Schema::table('member_money', function (Blueprint $table) {
            $table->foreign('member_id')
                ->references('id')->on('member')
                ->onDelete('cascade');
        });

        Schema::table('profile_comment', function (Blueprint $table) {
            $table->foreign('member_id')
                ->references('id')->on('member')
                ->onDelete('cascade');
        });

        Schema::table('register_writer', function (Blueprint $table) {
            $table->foreign('member_id')
                ->references('id')->on('member')
                ->onDelete('cascade');
        });

        Schema::table('story_comment', function (Blueprint $table) {
            $table->foreign('story_id')
                ->references('id')->on('story')
                ->onDelete('cascade');
        });

        Schema::table('sub_story_comment', function (Blueprint $table) {
            $table->foreign('sub_story_id')
                ->references('id')->on('sub_story')
                ->onDelete('cascade');
        });

        Schema::table('reply_comment_story', function (Blueprint $table) {
            $table->foreign('story_comment_id')
                ->references('id')->on('story_comment')
                ->onDelete('cascade');
        });

        Schema::table('reply_comment_sub_story', function (Blueprint $table) {
            $table->foreign('sub_story_comment_id')
                ->references('id')->on('sub_story_comment')
                ->onDelete('cascade');
        });

        Schema::table('tag', function (Blueprint $table) {
            $table->primary('story_id');
            $table->foreign('story_id')
                ->references('id')->on('story')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
    }
}
