<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 1/31/2021
 * Time: 3:55 PM
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chat\ChatMessageController;

Route::get('/chat-application', [ChatMessageController::class, 'chatscript'])->name('chatscript');
Route::get('/get-messages', [ChatMessageController::class, 'getMessages'])->name('getMessages');
Route::post('/start-converstation', [ChatMessageController::class, 'StartConversation'])->name('StartConversation');
Route::post('/send-message', [ChatMessageController::class, 'sendMessage'])->name('SendMessage');
