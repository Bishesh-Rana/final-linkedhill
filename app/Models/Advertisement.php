<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Stmt\Const_;

class Advertisement extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'external_url', 'section', 'direction', 'show_on', 'active', 'image', 'type', 'page'
    ];

    public const TYPE = [
        'promotional' => 'Promotional',
        'advertisement' => 'Advertisement',
    ];

    public const PAGE = [
        'main' => 'All',
        'home' => 'Home',
        'property' => 'Property',
        'blog' => 'Blog',
        'news' => 'News',
    ];

    public const DIRECTION = [
        'top' => 'Top',
        'bottom' => 'Bottom',
        'right' => 'Right',
        'left' => 'Left'
    ];

    public const DISPLAY = [
        'web' => 'Web',
        'mobile' => 'Mobile',
        'both' => 'Both'
    ];
    public const SECTION = [
        'main_header' => 'Header',
        'main_footer' => 'Footer',
        'home_header' => 'Header',
        'home_footer' => 'Footer',
        'blog_header' => 'Header',
        'blog_footer' => 'Footer',
        'news_header' => 'Header',
        'news_footer' => 'Footer',
        'property_header' => 'Header',
        'property_footer' => 'Footer',
        'home_properties' => 'Properties',
        'home_properties_type' => 'Properties Type',
        'home_news' => 'News',
        'home_blogs' => 'Blogs',
        'home_services' => 'Services',
    ];

    public const SIZE = [
        '0' => 'col-lg-12',
        '1' => 'col-lg-6',
        '2' => 'col-lg-4',
        '3' => 'col-lg-3',
        '4' => 'col-lg-2',
        '4' => 'col-lg-1',
    ];
    public const SIZEDISPLAY = [
        '0' => 'Full Column - 1/1',
        '1' => 'Half Column - 1/2',
        '2' => 'One third Column - 1/3',
        '3' => 'Quarter Column -  1/4',
        '4' => 'One sixth Column - 1/6',
        '4' => 'One Twelveth Column - 1/12',
    ];

    public function getDisplaySizeAttribute(): string
    {
        return Self::SIZE[$this->attributes['size']] ?? self::SIZE[0];
    }
}
