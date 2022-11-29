<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_faqs', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->text('answer');
            $table->boolean('featured')->default(true);
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('property_faqs');
    }
}
