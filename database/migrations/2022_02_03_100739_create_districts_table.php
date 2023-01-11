<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('np_name', 30)->nullable();
            $table->string('en_name',30)->nullable();
            $table->string('en_slug',30)->nullable();
            $table->string('np_slug',30)->nullable();
            $table->unsignedBigInteger('province')->nullable();
            $table->timestamps();
            $table->foreign('province')->references('id')->on('provinces')->onDelete('SET NULL')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
