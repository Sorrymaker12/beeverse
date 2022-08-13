<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->string('password');
            $table->string('temp')->nullable();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->enum('visible', ['visible', 'no'])->default('visible');
            $table->string('linkedin');
            $table->string('current_job');
            $table->string('current_fow');
            $table->string('fow_1');
            $table->string('fow_2');
            $table->string('fow_3');
            $table->string('current_company');
            $table->string('profile_picture');
            $table->integer('mobile_number');
            $table->integer('registration_price');
            $table->integer('coins');
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
        Schema::dropIfExists('users');
    }
}
