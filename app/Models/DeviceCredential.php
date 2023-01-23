<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class DeviceCredential extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function storeData($userId = null)
    {
        self::create(
            array_merge([
                'ip_address' => request()->ip(),
                'agent' => request()->userAgent()?? null,
                'userId' => $userId,
            ], getLocation())
        );
    }
}
