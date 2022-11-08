<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_categories', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->boolean('isQuery')->default(false);
            $table->enum('publish_status', ['1', '0'])->default('1');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('path')->nullable();
            $table->string('external_link')->nullable();
            $table->string('slug')->nullable();
            $table->enum('isMainMenu', ['0', '1'])->default('0');
            $table->mediumInteger('order')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_categories');
    }
}
