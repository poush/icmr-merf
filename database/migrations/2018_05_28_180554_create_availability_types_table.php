<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * This table is for availibility types. 
 * A user can add more availibility types.
 * availibility type "available" will indicate that slot can be booked, in case of others
 * booking will not be allowed.
 * 
 */
class CreateAvailabilityTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availability_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string("type")->comment("default,blocked_slot,booked,available")->default("default");
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
        Schema::dropIfExists('availability_types');
    }
}
