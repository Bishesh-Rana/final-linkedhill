<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradelinkBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tradelink_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tradelink_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('status', ['completed', 'cancelled', 'pending', 'progress'])->default('pending');
            $table->timestamps();

            $table->foreign('tradelink_id')->references('id')->on('tradelinks')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tradelink_books');
    }
}
