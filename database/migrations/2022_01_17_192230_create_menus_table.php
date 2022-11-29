<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name', 50)->nullable();
            $table->string('slug', 50)->nullable();
            $table->string('url', 200)->nullable();
            $table->string('type', 20)->nullable();
            $table->string('show', 20)->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->default(0)->nullable();
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
        Schema::dropIfExists('menus');
    }
}
