<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsRentalProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_rental_products', function (Blueprint $table) {
            //Offer Id
            $table->id();
            //Rent or sell
            $table->integer('rent')->nullable();
            //Cat type
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('Category')->onDelete('set null');
            //sub category type => add type ok
            $table->bigInteger('sell_type_id')->unsigned()->nullable();
            $table->foreign('sell_type_id')->references('id')->on('sell_types')->onDelete('set null');
            //sections =>ok
            $table->bigInteger('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('set null');
            //Classifications for each section
            $table->bigInteger('type_category_id')->unsigned()->nullable();
            $table->foreign('type_category_id')->references('id')->on('type_categories')->onDelete('set null');
            //Make
            $table->bigInteger('make_id')->unsigned()->nullable();
            $table->foreign('make_id')->references('id')->on('makes')->onDelete('set null');
            //Model
            $table->string('model')->nullable();
            //Status
            $table->string('status_id')->nullable();
            //Year
            $table->year('year');
            //Gearbox
            $table->string('gearbox_id');
            //Fuel Type
            $table->bigInteger('fuel_type_id')->unsigned()->nullable();
            $table->foreign('fuel_type_id')->references('id')->on('FuelType')->onDelete('set null');
            //Distance
            $table->float('distance')->nullable();
            //Work hours
            $table->float('work_hour');
            //Color
            $table->string('color');
            //Price
            $table->float('price');
            //Payment Method
            $table->string('payment_method');
            //City
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            //District
            $table->bigInteger('district_id')->unsigned()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            //Advantages
            $table->bigInteger('advandage_id')->unsigned()->nullable();
            $table->foreign('advandage_id')->references('id')->on('Advandage')->onDelete('set null');
            //interior brushes
            $table->string('interior_brush')->nullable();
            //interior color
            $table->string('interior_color')->nullable();

            //If our product for rent
            $table->string('rent_period')->nullable();


            $table->string('title');
            $table->string('description');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('images');

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
        Schema::dropIfExists('cars_rental_products');
    }
}
