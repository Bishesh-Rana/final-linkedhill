<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAgent extends Model
{
    use HasFactory;

    protected  $table ="user_agent";

    protected $fillable =[
        'user_id','agent_id'
    ];

    public function agency()
    {
        return $this->belongsTo(User::class,'agent_id');
    }


}
