<?php

namespace App\Http\Controllers\Api;

use App\Actions\Property\Review;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyReviewResource;
use App\Models\Property;
use App\Models\PropertyReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PropertyReviewController extends Controller
{
    private $review;
    private float $totalRating;
    private  $avgRating;
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function index(Request $request)
    {
        return $request->all();
        try {

            $data =   $this->review->create($request->all());
            return $this->successResponse(new PropertyReviewResource($data));
        } catch (ValidationException $th) {
            return $this->validationError($th);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

    public function propertyReview(Request $request)
    {
        $properties = PropertyReview::where('property_id', $request->id)->latest()->paginate(20);
        return $this->returnResponse(PropertyReviewResource::collection($properties), $paginate = true);
    }

    public function propertyStatistics(Request $request)
    {
        $total = DB::table('property_reviews')
            ->where('property_id', $request->id)
            ->selectRaw('count(*) as total,ceil(rating) as rating')
            ->groupByRaw('ceil(rating)')
            ->get();

        $this->avgRating = DB::table('property_reviews')
            ->where('property_id', $request->id)
            ->avg('rating');
        $this->totalRating = DB::table('property_reviews')
            ->where('property_id', $request->id)
            ->count();

        $rating = [
            '1' => $this->calculatePercentage($total, 1) + $this->calculatePercentage($total, 0),
            '2' => $this->calculatePercentage($total, 2),
            '3' => $this->calculatePercentage($total, 3),
            '4' => $this->calculatePercentage($total, 4),
            '5' => $this->calculatePercentage($total, 5),
            'avg' => (float) bcdiv($this->avgRating, 1, 1),
            'total' => (int) $total->sum('total'),
        ];
        return $this->returnResponse(collect($rating));
    }

    private function calculatePercentage($total, $rating)
    {
        $percentage = optional($total->where('rating', $rating)->first())->total * 100 / ($this->totalRating == 0 ?  1 : $this->totalRating);
        return (int) bcdiv($percentage, 1, 1);
    }
}
