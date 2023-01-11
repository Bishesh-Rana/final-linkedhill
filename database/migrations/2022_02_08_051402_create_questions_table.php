<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->longText('description')->nullable();
            $table->enum('publish_status', ['1', '0'])->default('1');
            $table->longText('search_key')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('categoryId')->nullable();
            $table->unsignedBigInteger('parentId')->nullable();
            $table->enum('isParent', ['1', '0'])->default('0');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('categoryId')->references('id')->on('chat_categories')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('parentId')->references('id')->on('questions')->onDelete('SET NULL')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
