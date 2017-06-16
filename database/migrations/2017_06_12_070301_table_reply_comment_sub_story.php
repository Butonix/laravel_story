<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableReplyCommentSubStory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_comment_sub_story', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sub_story_comment_id');
            $table->unsignedInteger('member_id');
            $table->longText('comment_detail');
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
        Schema::dropIfExists('reply_comment_sub_story');
    }
}
