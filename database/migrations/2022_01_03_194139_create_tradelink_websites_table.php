<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradelinkWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tradelink_websites', function (Blueprint $table) {
            $table->id();
            $table->string('logo',100);
            $table->string('website_title',50);
            $table->string('copyright_message',100);
            $table->string('phone',15);
            $table->string('email',100);
            $table->text('short_description');
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
        Schema::dropIfExists('tradelink_websites');
    }
}
