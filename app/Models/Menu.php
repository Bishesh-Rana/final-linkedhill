<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id', 'name', 'slug', 'url', 'order', 'active', 'type', 'show', 'description', 'image'
    ];
    public const TYPE = [
        'home' => 'Homepage',
        'about' => 'About',
        'property' => 'Property',
        'service' => 'Service',
        'contact' => 'Contact',
        'team' => 'Team',
        'blog' => 'Blog',
        'news' => 'News',
        'faq' => 'FAQ',
        'basic' => 'Basic Page',
    ];
    public const SHOW = [
        'none' => 'None',
        'header' => 'Header',
        'footer' => 'Footer',
        'both' => 'Both'
    ];

    protected $casts = [
        'show' => 'array'
    ];
    public function child_menu()
    {
        return $this->hasMany('App\Models\Menu', 'parent_id', 'id')->orderby('order', 'asc');
    }
}
