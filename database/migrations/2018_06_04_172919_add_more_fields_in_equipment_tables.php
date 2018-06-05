<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFieldsInEquipmentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipments', function (Blueprint $table) {
            
            $table->smallInteger('equipment_age')->nullable()->after('location');
            $table->string('source_funding')->nullable()->after('location');
            $table->string('state_art')->nullable()->after('location');
            $table->datetime('not_working_since')->nullable()->after('location');
            $table->date('purchase_date')->nullable()->after('location');
            $table->boolean('latest_technology')->nullable()->after('location');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipments', function (Blueprint $table) {
            
            $table->dropColumn(['equipment_age', 'source_funding', 'state_art', 'not_working_since', 'purchase_date', 'latest_technology']);

        });
    }
}
