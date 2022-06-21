<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generators', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            
            $table->bigInteger('sell_type_id')->unsigned()->nullable();
            $table->foreign('sell_type_id')->references('id')->on('sell_types')->onDelete('set null');
             
            $table->bigInteger('make_id')->unsigned()->nullable();
            $table->foreign('make_id')->references('id')->on('makes')->onDelete('set null');
            
            $table->string('model')->nullable();

            $table->bigInteger('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('set null');

            $table->bigInteger('fuel_type_id')->unsigned()->nullable();
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types')->onDelete('set null');
            
            $table->string('country')->nullable();

            $table->string('ability')->nullable();

            $table->string('capacity')->nullable();

            $table->string('fuel_tank_size')->nullable();

            $table->bigInteger('engine_type')->unsigned()->nullable();
            
            $table->string('number_of_phase')->nullable();

            $table->string('frequency_rate')->nullable();

            $table->string('muffler_box')->nullable();

            $table->string('description')->nullable();

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->string('images')->nullable();
            $table->string('price')->nullable();
            $table->string('title')->nullable();
            
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
        Schema::dropIfExists('generators');
    }
}
