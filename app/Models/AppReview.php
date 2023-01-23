<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppReview extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id')->withDefault();
    }
}
