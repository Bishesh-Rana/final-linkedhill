<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tradelink extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(TradelinkCategory::class, 'category_id')->withDefault();
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function booking(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'tradelink_books',  'tradelink_id', 'user_id');
    }
}
