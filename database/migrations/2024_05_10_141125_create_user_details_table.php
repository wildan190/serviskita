<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->date('UserBirthDate');
            $table->string('UserPhoneNumber');
            $table->string('UserCountry');
            $table->string('UserProvince');
            $table->string('UserRegency');
            $table->string('UserSubdistrict');
            $table->string('UserVillage');
            $table->string('UserAddress');
            $table->string('UserAddressDetails')->nullable();
            $table->string('PostalCode');
            $table->unsignedBigInteger('User_id');
            $table->foreign('User_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_details');
    }
}
