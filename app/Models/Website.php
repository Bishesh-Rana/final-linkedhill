<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'logo',
        'logo_footer',
        'favicon',
        'phone',
        'address',
        'alternate_email',
        'fb_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'playstore_url',
        'appstore_url',
        'map_url',
        'short_intro',
        'phone',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'og_url',
        'og_type',
        'og_title',
        'og_description',

        'pro_title',
        'pro_sub_title',

        'second_pro_title',
        'second_pro_sub_title',

        'blog_title',
        'blog_sub_title',

        'login_title',
        'login_sub_title',
        'second_login_sub_title',
        'third_login_sub_title',
        'four_login_sub_title',
    ];
}
