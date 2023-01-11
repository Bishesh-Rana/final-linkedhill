<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title',
        'description',
        "search_key",
        "publish_status" ,
        "image",
        "url",
        "created_by",
        "categoryId",
        "parentId",
        "isParent"
        // "isParent",
    ];
    protected $casts = [
        'title' => "json",
        "description" => "json"
    ];
    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

}
