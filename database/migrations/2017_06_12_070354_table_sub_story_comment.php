<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSubStoryComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_story_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sub_story_id');
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
        Schema::dropIfExists('sub_story_comment');
    }
}
