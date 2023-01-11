<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pricing extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $fillable = ['title', 'slug', 'description', 'features', 'image', 'price'];
    public $casts = [
        'features' => 'array'
    ];

    public function getPriceFormatAttribute()
    {
        $price = explode('.', $this->price);
        return '<span>'.$price[0].'</span>.'.$price[1];
    }
}
