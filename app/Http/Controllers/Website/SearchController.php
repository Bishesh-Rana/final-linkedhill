<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        // dd("bishesh");
        $property =  Property::filter() ->paginate(20);

        return $this->returnResponse(PropertyResource::collection($property), $paginate = true);
    }
}
