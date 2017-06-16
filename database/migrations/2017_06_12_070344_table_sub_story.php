<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSubStory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_story', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('story_id');
            $table->string('story_name');
            $table->longText('story_outline');
            $table->unsignedTinyInteger('status_ban');
            $table->unsignedTinyInteger('status_public');
            $table->unsignedTinyInteger('status_comment');
            $table->unsignedInteger('unlock_coin');
            $table->unsignedInteger('unlock_diamond');
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
        Schema::dropIfExists('sub_story');
    }
}
