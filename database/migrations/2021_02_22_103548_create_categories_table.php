<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['blog', 'news'])->default('blog');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->boolean('feature')->default(false);
            $table->string('meta_keyword')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
