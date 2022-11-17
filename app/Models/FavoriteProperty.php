<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProperty extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','property_id'];
}
