<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PropertyFaq extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable =[
        'question','answer','property_id','featured'
    ];
}
