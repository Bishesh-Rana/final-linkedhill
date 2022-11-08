<?php

namespace App\Http\Controllers\Api\Property;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavouriteListResource;
use App\Http\Resources\PropertyResource;
use App\Models\FavouriteList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavouriteController extends Controller
{
    public function toggleFavourite(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'property_id' => ['required', 'exists:properties,id']
        ]);
        if ($validation->fails()) {
            return $this->validationError($validation);
        }
        $user = auth()->user();
        if ($property = $user->favProperties()->where('property_id', $request->property_id)->first()) {
            $property->delete();
            return $this->successResponse('removed from favourite list','removed from favourite list');
        }

        $user->favProperties()->create(
            ['property_id' => $request->property_id]
        );
        return $this->successResponse('added to favourite list','added to favourite list');
    }


    public function getFavourites(Request $request)
    {
        $user = auth()->guard('api')->user();
        $favList = $user->favouriteProperties()->when(!in_array($request->category_id, ['0', null]), fn ($query) => $query->where('category_id', $request->category_id))
            ->join('property_images', 'property_images.property_id', 'properties.id')
            ->with('area_unit', 'property_category:id,name')
            ->paginate($request->limit ?? 5);
        return $this->returnResponse(PropertyResource::collection($favList));
    }
}
