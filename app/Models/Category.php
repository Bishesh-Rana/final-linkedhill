<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** blog category */
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'image',
        'type',
        'description',
        'meta_keyword',
        'meta_description',
        'feature'
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class,'blog_category','category_id','blog_id')->withTimestamps();
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
