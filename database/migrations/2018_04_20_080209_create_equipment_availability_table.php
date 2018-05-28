<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentAvailabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_availability', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('equipment_id');
            $table->unsignedInteger('institute_id');

            $table->timestampTz('from')->nullable();
            $table->timestampTz('to')->nullable();

            $table->unsignedInteger('added_by')->nullable();

            $table->integer('availability_type_id')->comment("availibility type id");

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_availability');
    }
}
