<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationList extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'conversation_id',
    ];

    public function lastMessage(){
        return $this->hasOne('App\Models\ChatMessage', 'conversationId', 'id');
    }
}
