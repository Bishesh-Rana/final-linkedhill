<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatCategoryReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_category_references', function (Blueprint $table) {
            $table->id();
            $table->longText('references')->nullable();
            $table->enum('publish_status', ['1', '0'])->default('1');
            $table->mediumInteger('order')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('categoryId')->nullable();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('categoryId')->references('id')->on('chat_categories')->onDelete('SET NULL')->onUpdate('CASCADE');
            // $table->mediumInteger('order')->nullable();
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
        Schema::dropIfExists('chat_category_references');
    }
}
