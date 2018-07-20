<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id')     ->comment("primary key.");
            $table->string('name')          ->comment("admin's name.");
            $table->string('username')      ->comment("admin's username. Use to login account.");
            $table->string('password')      ->comment("admin's password. Use to login account.");
            $table->rememberToken()         ->comment("password reset token. For password reset function.");
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
        Schema::dropIfExists('admins');
    }
}
