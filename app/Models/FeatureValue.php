<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureValue extends Model
{
    use HasFactory;
    protected $fillable=['feature_id','value'];

    public function feature(){
        return $this->belongsTo(Feature::class);
    }
}


