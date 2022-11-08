<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const TYPE = [
        1 => 'Main',
        2 => 'Services',
        3 => 'Property',
    ];

    protected $fillable = [
        'title', 'order', 'hide', 'url', 'image', 'type'
    ];

    public function getSliderTypeAttribute()
    {
        return self::TYPE[$this->type] ?? self::TYPE[1];
    }
}
