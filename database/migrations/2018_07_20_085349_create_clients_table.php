<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id')                 ->comment("primary key.");
            $table->string('username')                  ->comment("client's username. Use to check same client or not.");
            $table->string('name')      ->nullable()    ->comment("client's name. ");
            $table->string('email')     ->unique()     ->comment("client's email. Use to login account.");
            $table->string('password')                  ->comment("client's password. Use to login account.");
            $table->rememberToken()                     ->comment("password reset token. For password reset function.");
            $table->timestamps();
            $table->tinyInteger('deactivate')           ->comment("flag. Use to check the account is deactivate or not.");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
