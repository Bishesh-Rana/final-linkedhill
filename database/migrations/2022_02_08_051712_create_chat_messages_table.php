<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conversationId')->nullable();
            $table->text('message')->nullable();
            $table->enum('messageFrom', ['admin', 'user'])->default('user');
            $table->enum('message_by', [ 'bot', 'user'])->default('bot')->comment('if  message by bot condition');
            $table->text('text')->nullable();
            $table->text('file')->nullable();
            $table->enum('sender_seen', ['seen', 'unseen'])->default('seen');
            $table->enum('receiver_seen', ['seen', 'unseen'])->default('unseen');
            $table->enum('sender_action', ['1', '0'])->default('0');
            $table->enum('receiver_action', ['1', '0'])->default('0');
            $table->string('messageIn')->nullable()->comment('en/np/lang');

            $table->timestamp('sender_seen_at')->nullable();
            $table->timestamp('receiver_seen_at')->nullable();
            $table->unsignedBigInteger('adminId')->nullable();
            $table->unsignedBigInteger('questionId')->nullable();
            $table->unsignedBigInteger('categoryId')->nullable();

            $table->timestamps();
            $table->foreign('adminId')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('questionId')->references('id')->on('questions')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('categoryId')->references('id')->on('chat_categories')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('conversationId')->references('id')->on('conversation_lists')->onDelete('SET NULL')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_messages');
    }
}
