<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('external_url');
            $table->string('page')->default('home');
            $table->string('section', 50)->nullable();
            $table->tinyInteger('size')->comment('size of advertisement')->default(0);
            $table->string('direction')->nullable();
            $table->string('type')->comment('Promotional or advertisement')->nullable();
            $table->integer('count')->default(0);
            $table->enum('show_on', ['mobile', 'web', 'both'])->default('both');
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('advertisements');
    }
}
