<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableStory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id');
            $table->unsignedInteger('category_id');
            $table->string('story_name');
            $table->string('story_author');
            $table->longText('story_outline');
            $table->string('story_picture');
            $table->unsignedTinyInteger('status_ban');
            $table->unsignedTinyInteger('status_public');
            $table->unsignedTinyInteger('status_comment');
            $table->unsignedInteger('count_visitor');
            $table->unsignedInteger('count_like');
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
        Schema::dropIfExists('story');
    }
}
