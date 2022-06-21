<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('company_name');
            $table->string('jurisdiction');
            $table->string('register_type');
            $table->string('phone');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instgram');
            $table->string('cover')->nullable();
            $table->string('photo')->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->bigInteger('subscription_id')->unsigned()->nullable();
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('set null');
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
