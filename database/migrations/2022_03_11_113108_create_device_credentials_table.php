<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_credentials', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->string('agent')->comment('browser that users logged in with');
            $table->string('country')->nullable();
            $table->string('countryCode')->nullable();
            $table->string('region')->nullable();
            $table->string('regionName')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('timezone')->nullable();
            $table->string('isp')->nullable();
            $table->string('org')->nullable();
            $table->string('as')->nullable();
            $table->string('location');
            $table->unsignedBigInteger('userId')->nullable();
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_credentials');
    }
}
