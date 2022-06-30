<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directors', function (Blueprint $table) {
            $table->string('user_id');
            $table->primary('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('name');
            $table->string('images')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('designation')->nullable();
            $table->string('organisation')->nullable();
            $table->string('bio')->nullable();
            $table->text('address')->nullable();
            $table->string('blood_group')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directors');
    }
}
