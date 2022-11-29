<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradelinkWebsite extends Model
{
    use HasFactory;
    protected $fillable =[
     'website_title','email','phone','copyright_message','fb_url','instagram_url','short_description'
    ];
}
