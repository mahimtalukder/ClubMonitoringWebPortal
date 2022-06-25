<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestedComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requested_components', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_id')->unsigned();
            $table->foreign('application_id')->references('id')->on('applications');
            $table->integer('requested_component')->unsigned();
            $table->string('is_approved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requested_components');
    }
}
