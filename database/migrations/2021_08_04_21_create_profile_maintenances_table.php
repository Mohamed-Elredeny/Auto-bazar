<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_maintenances', function (Blueprint $table) {
            $table->id();

            $table->string('cover')->nullable();
            $table->string('photo')->nullable();

            $table->bigInteger('sell_type_id')->unsigned()->nullable();
            $table->foreign('sell_type_id')->references('id')->on('sell_types')->onDelete('set null');
            
            $table->bigInteger('type_category_id')->unsigned()->nullable();
            $table->foreign('type_category_id')->references('id')->on('type_categories')->onDelete('set null');
            

            $table->bigInteger('specialization_id')->unsigned()->nullable();
            $table->foreign('specialization_id')->references('id')->on('specializations')->onDelete('set null');
            
            $table->string('work_hour')->nullable();

            $table->string('holidays')->nullable();

            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            
            $table->bigInteger('district_id')->unsigned()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            
            $table->string('address')->nullable();

            $table->string('phone');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instgram');

            $table->string('name');
            $table->string('password');
            $table->string('email');
            $table->text('description');

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
        Schema::dropIfExists('profile_maintenances');
    }
}
