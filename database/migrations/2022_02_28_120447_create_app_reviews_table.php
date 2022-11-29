<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('users')->constrained();
            $table->string('description', 500)->nullable();
            $table->decimal('rating', 2, 1)->default(5.0);
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
        Schema::dropIfExists('app_reviews');
    }
}
