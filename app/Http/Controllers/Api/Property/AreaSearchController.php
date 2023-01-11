<?php

namespace App\Http\Controllers\Api\Property;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AreaSearchController extends Controller
{
    public function search(Request  $request)
    {
        try {
            Validator::make($request->all(), [
                'city_id' => ['required', 'exists:cities,id']
            ])->validate();
            $areas = Area::query()
                ->where('city_id', request('city_id'))
                ->select('id', 'name')
                ->get();
            return $this->returnResponse($areas);
        } catch (ValidationException $th) {
            return $this->validationError($th);
        } catch (\Throwable $th) {
            return $this->errorResponse($th);
        }
    }
}
