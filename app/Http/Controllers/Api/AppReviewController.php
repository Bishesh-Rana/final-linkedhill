<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppReviewResource;
use App\Models\AppReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppReviewController extends Controller
{
    public $limit = 20;
    public function index(Request $request)
    {
        $appReview  = AppReview::latest()->paginate($request->limit ?? $this->limit);
        return $this->returnResponse(AppReviewResource::collection($appReview), $paginate = true);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'review' => 'required',
            'rating' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->validationError($validator);
        }
        try {
            $appReview = AppReview::create(
                [
                    'customer_id' => auth()->id(),
                    'rating' => $request->rating,
                    'description' => $request->review
                ]
            );
            return $this->returnResponse(new AppReviewResource($appReview));
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }
}
