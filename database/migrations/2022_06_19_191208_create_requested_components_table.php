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
            $table->string('application_id');
            $table->foreign('application_id')->references('application_id')->on('applications');
            $table->integer('component_id')->unsigned();
            $table->string('start_time');
            $table->string('approved_start_time')->nullable();
            $table->string('end_time');
            $table->string('approved_end_time')->nullable();
            $table->integer('quantity')->unsigned();
            $table->string('is_approved')->nullable();
            $table->string('remarks')->nullable();
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
