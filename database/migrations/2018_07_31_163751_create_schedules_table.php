<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id')                            ->comment("primary key.");
            $table->bigInteger('doctor_id')                        ->comment("doctor table id. To know with which doctor that the patient made schedule.");
            $table->string('name')                                 ->comment("patient's name");
            $table->dateTime('appointment_time')                   ->comment("appointment date and time");
            $table->tinyInteger('status')->default(0)              ->comment("appointment status. (Pending, Confirm and Complete)");
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
        Schema::dropIfExists('schedules');
    }
}
