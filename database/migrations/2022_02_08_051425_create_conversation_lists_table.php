<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversation_lists', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('conversation_id')->nullable();
            $table->timestamps();
        });
        DB::update("ALTER TABLE conversation_lists AUTO_INCREMENT  = 100000;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversation_lists');
    }
}
