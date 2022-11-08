<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradelinkBook extends Model
{
    use HasFactory;
    protected $guarded = [];

    public const LEVEL = [
        'pending' => 1,
        'progress' => 2,
        'cancelled' => 3,
        'completed' => 4,
    ];
}
