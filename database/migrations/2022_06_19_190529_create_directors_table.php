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
            $table->string('images');
            $table->string('dob');
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('designation');
            $table->string('organisation');
            $table->string('bio');
            $table->text('address');
            $table->string('blood_group');

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
