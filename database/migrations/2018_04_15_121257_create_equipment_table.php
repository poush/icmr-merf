<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->increments('id');

            // $table->unsignedInteger('institude_id');
            $table->string('name');
            $table->string('manufacturer');
            $table->string('model');
            $table->integer('quantity')->nullable();
            $table->json('specs')->nullable();
            $table->boolean('is_working')->nullable();
            $table->text('extra')->nullable();
            $table->text('features')->nullable();
            $table->text('working')->nullable();
            $table->text('operation')->nullable();
            $table->text('description')->nullable();
            $table->text('health_problems')->nullable();
            $table->text('training_requirement')->nullable();
            $table->text('machine_rest')->nullable();
            $table->string('location')->nullable();

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
        Schema::dropIfExists('equipments');
    }
}
