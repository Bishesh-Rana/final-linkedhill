<?php

namespace App\Actions\Property;

use App\Contracts\Actionable;
use App\Models\PropertyReview;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response as HttpResponse;

class Review implements Actionable
{

    public function create(array $input)
    {
        $validation = Validator::make($input, [
            'id' => ['required', 'exists:properties,id'],
            'review' => ['required', 'max:500'],
            'rating' => ['required', 'max:5', 'numeric']
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'code' => HttpResponse::HTTP_UNPROCESSABLE_ENTITY,
                'data' => null,
                'message' => array_values(collect($validation->errors())->flatten()->toArray())
            ], HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        return PropertyReview::create([
            'property_id' => $input['id'],
            'description' => $input['review'],
            'rating' => $input['rating'],
            'customer_id' => auth()->id(),
        ]);
    }
}
