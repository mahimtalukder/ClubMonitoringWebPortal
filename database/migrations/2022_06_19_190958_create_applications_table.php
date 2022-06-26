<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('application_id')->unique();
            $table->string('subject');
            $table->text('description');
            $table->string('is_approved')->nullable();
            $table->string('rejection_msg')->nullable();
            $table->timestamps();
            $table->string('executive_id');
            $table->foreign('executive_id')->references('user_id')->on('executives');
            $table->string('director_id')->nullable();
            $table->foreign('director_id')->references('user_id')->on('directors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
