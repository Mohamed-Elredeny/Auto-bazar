<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            
            // $table->bigInteger('subcategory_id')->unsigned()->nullable();
            // $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('set null');
            
            $table->bigInteger('sell_type_id')->unsigned()->nullable();
            $table->foreign('sell_type_id')->references('id')->on('sell_types')->onDelete('set null');
            
            $table->bigInteger('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('set null');
            
            $table->string('type_category_id')->unsigned()->nullable();
            
            $table->bigInteger('make_id')->unsigned()->nullable();
            $table->foreign('make_id')->references('id')->on('makes')->onDelete('set null');
            
            $table->string('model')->nullable();

            $table->bigInteger('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('set null');

            $table->year('year');

            $table->bigInteger('gearbox_id')->unsigned()->nullable();
            $table->foreign('gearbox_id')->references('id')->on('gearboxes')->onDelete('set null');
            
            $table->bigInteger('fuel_type_id')->unsigned()->nullable();
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types')->onDelete('set null');
            
            $table->string('distance')->nullable();

            $table->string('work_hour')->nullable();

            $table->string('color')->nullable();

            $table->string('payment_method')->nullable();

            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            
            $table->bigInteger('district_id')->unsigned()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            
            $table->bigInteger('advandage_id')->unsigned()->nullable();
            
            $table->string('interior_brush')->nullable();

            $table->string('interior_color')->nullable();

            $table->string('product_type')->nullable();

            $table->text('description')->nullable();

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
        Schema::dropIfExists('products');
    }
}
