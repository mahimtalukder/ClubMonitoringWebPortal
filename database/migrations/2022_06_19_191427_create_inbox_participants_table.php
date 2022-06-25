<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbox_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->integer('inbox_id')->unsigned();
            $table->foreign('inbox_id')->references('id')->on('inboxes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inbox_participants');
    }
}
