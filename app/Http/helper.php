<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 4/20/2021
 * Time: 2:52 PM
 */

// function propertyAgent($property_id)
// {

    //    $data = \App\Models\AgencyProperty::where('property_id', $property_id)->first();
    //
    //
    //    if ($data) {
    //        return $data->agency_id;
    //    } else {
    //
    //
    //            $property_owner = \App\Models\Property::find($property_id)->user_id;
    //
    //            $agency = \App\Models\User::find($property_owner)->hasAgency;
    //
    //            if ($agency) {
    //                return $property_owner;
    //            } else {
    //                return  0;
    //            }
    //
    //
    //
    //
    //
    //
    //    }
// }

function propertyHasAgent($property_id)
{
    $data = \App\Models\AgencyProperty::where('property_id', $property_id)->first();

    if ($data) {
        return true;
    }

    return false;
}

function findPropertyAgent($property_id)
{
    $property = \App\Models\Property::find($property_id);
    $data = \App\Models\AgencyProperty::where('property_id', $property_id)->first();
    if ($data) {
        $agency = \App\Models\User::find($data->agency_id);
        return $agency;
    } else {
        $agencyDetail = \App\Models\AgencyDetail::where(['user_id' => $property->user->id, 'status' => 'verified'])->first();
        if ($agencyDetail) {
            $agency = \App\Models\User::find($agencyDetail->user_id);
            return $agency;
        }
    }

    return $data;
}



function isFavouriteProperty($id)
{
    $favProperty = [];

    try {
        foreach (\Illuminate\Support\Facades\Auth::user()->favProperties as $item) {
            $favProperty[] = $item->property_id;
        }
    } finally {
        if (in_array($id, $favProperty)) {
            return true;
        }

        return false;
    }
}

function image($url){
    // if(env('APP_URL') == 'http://127.0.0.1:8000/'){
    //     // $url = (string) $url;
    //     // $urn = str_replace("linkedhill.com.np","127.0.0.1:8000",$url);
    //     $url = str_replace('https','http',$url);
    //     $url = str_replace('www.','',$url);
    //     return str_replace("linkedhill.com.np","127.0.0.1:8000",$url);
    // } else{
        return $url;
        // return str_replace("http://127.0.0.1:8000/","https://linkedhill.com.np/",$url);
    // }
}


function activeMenu($menu)
{
    return request()->is(str_replace(asset('/'), '', $menu['href'])) ? 'active' : null;
}


function formattedNepaliNumber($value)
{
    $locale = 'en_IN';
    $formatter = new NumberFormatter($locale, NumberFormatter::DECIMAL);
    $number = $value;
    $formattedNumber = $formatter->format($number);
    return $formattedNumber;
}


function getSummary($value)
{
    return Str::limit(strip_tags($value), 160, '...');
}

function getLocation(): array
{

    try {
        $body = Http::get('http://ip-api.com/json/' . request()->ip());
        return [
            "country" => $body->json()['country'],
            "countryCode" => $body->json()['countryCode'],
            "region" => $body->json()['region'],
            "regionName" => $body->json()['regionName'],
            "city" => $body->json()['city'],
            "zip" => $body->json()['zip'],
            "latitude" => $body->json()['lat'],
            "longitude" => $body->json()['lon'],
            "timezone" => $body->json()['timezone'],
            "isp" => $body->json()['isp'],
            "org" => $body->json()['org'],
            "as" => $body->json()['as'],
        ];
    } catch (\Throwable $th) {
        return [
            "country" => "Nepal",
            "countryCode" => "Np",
            "region" => "QC",
            "regionName" => "Quebec",
            "city" => "Montreal",
            "zip" => "H1K",
            "latitude" => 27.6528668,
            "longitude" => 85.3467412,
            "timezone" => "Asia/Nepal",
            "isp" => "",
            "org" => "",
            "as" => ""
        ];
    }
}
