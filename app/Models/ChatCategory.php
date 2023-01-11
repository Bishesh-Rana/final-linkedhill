<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "title",
        "publish_status",
        "created_by",
        "thumbnail",
        "path",
        "external_link",
        "slug",
        "slug",
        "isMainMenu",
        "order",
        "isQuery"
    ];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'title' => "json",
        "description" => "json",
    ];
    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    public function chatAnswers(){
        return $this->hasMany(ChatCategoryReference::class, 'categoryId','id');
    }
    public function child_questions(){
        return $this->hasMany(Question::class, 'categoryId', 'id');
    }
}
