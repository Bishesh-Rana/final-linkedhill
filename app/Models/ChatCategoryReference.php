<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatCategoryReference extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "publish_status",
        "created_by",
        "categoryId",
        "references",
        "order"
    ];
    protected $dates = ['deleted_at'];
    protected $casts = [
        "references" => "json",
    ];
    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
