<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ServiceDetailResource;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ServiceController extends Controller
{
    public $limit = 10;
    public function getServiceCategories(Request $request)
    {
        $categories = ServiceCategory::select('name as title', 'id', 'image')
            ->get();
        $default = ['id' => 0, 'title' => 'All', 'image' => null];
        return $this->returnResponse(CategoryResource::collection($categories->prepend($default)));
    }
    public function getServices(Request $request)
    {
        $services = Service::latest()->with('category:id,name')
            ->when($request->category_id, fn ($query) => $query->where('service_category_id', $request->category_id))
            ->when($request->name, fn ($query) => $query->where('services.name', 'like', "%" . $request->name . "%"))
            ->where('feature', 1)
            ->paginate($request->limit ?? $this->limit);
        return $this->returnResponse(ServiceResource::collection($services), $paginate = true);
    }
    public function serviceDetail(Request $request)
    {
        try {
            Validator::make($request->all(), ['id' => ['required', 'exists:services,id']])->validate();
            $property = Service::findorfail($request->id);
            return $this->successResponse(new ServiceDetailResource($property));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return $this->notFoundResponse();
        } catch (ValidationException $th) {
            return $this->validationError($th);
        } catch (\Exception $th) {
            return $this->errorResponse($th->getMessage());
        }
    }
}
