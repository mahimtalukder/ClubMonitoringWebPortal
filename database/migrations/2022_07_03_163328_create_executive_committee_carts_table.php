<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutiveCommitteeCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executive_committee_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->foreign('user_id')->references('user_id')->on('members');
            $table->string('name');
            $table->string('designation');
            $table->integer('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs');
            $table->integer('committee_number');
            $table->string('added_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('executive_committee_carts');
    }
}
