<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableRegisterWriter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_writer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id');
            $table->string('full_name');
            $table->string('id_card', 13);
            $table->string('address');
            $table->string('tel');
            $table->string('bank_name');
            $table->string('bank_sub_branch');
            $table->string('bank_account_number');
            $table->string('bank_account_name');
            $table->unsignedTinyInteger('status_confirm');
            $table->unsignedTinyInteger('status_reject');
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
        Schema::dropIfExists('register_writer');
    }
}
