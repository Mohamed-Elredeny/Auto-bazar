<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_categories', function (Blueprint $table) {
            $table->id();
            $table->string('Title_ar')->nullable();
            $table->string('Title_en')->nullable();
            $table->string('Title_ku')->nullable();
            $table->string('image')->nullable();

            $table->bigInteger('sell_type_id')->unsigned()->nullable();
            $table->foreign('sell_type_id')->references('id')->on('sell_types')->onDelete('set null');
            
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
        Schema::dropIfExists('type_categories');
    }
}
