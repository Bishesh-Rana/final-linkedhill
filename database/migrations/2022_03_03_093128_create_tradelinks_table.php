<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradelinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tradelinks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone', 20)->nullable();
            $table->string('image')->nullable();
            $table->string('email', 40)->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('tradelink_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('verified_by')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tradelinks');
    }
}
