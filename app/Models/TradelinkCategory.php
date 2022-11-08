<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TradelinkCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tradelink(): HasMany
    {
        return $this->hasMany(Tradelink::class, 'category_id');
    }

    public function child(): HasMany
    {
        return $this->hasMany(TradelinkCategory::class, 'parent_id');
    }
}
