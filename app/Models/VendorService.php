<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorService extends Model
{
    protected  $table = "vendor_service";
    use HasFactory;

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function vendor()
    {
        return $this->belongsTo(TradelinkAdmin::class,'vendor_id');
    }
}
