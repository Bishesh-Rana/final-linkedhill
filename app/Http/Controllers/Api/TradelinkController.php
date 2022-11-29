<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\TradelinkDetailResource;
use App\Http\Resources\TradelinkResource;
use App\Models\Tradelink;
use App\Models\TradelinkCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TradelinkController extends Controller
{
    public $limit = 10;
    public function tradelinkCategory(Request $request, $children = null)
    {
        $tradelink = TradelinkCategory::select('id', 'title', 'image')
            ->whereNull('parent_id')
            ->paginate($request->limit ?? $this->limit);
        return $this->returnResponse(CategoryResource::collection($tradelink), $paginate = true);
    }

    public function tradelinkChildrenCategory(Request $request, $children = null)
    {
        $tradelink = TradelinkCategory::select('id', 'title', 'image')
            ->whereNotNull('parent_id')
            ->when($request->category_id, fn ($query) => $query->where('parent_id', $request->category_id))
            ->paginate($request->limit ?? $this->limit);
        return $this->returnResponse(CategoryResource::collection($tradelink), $paginate = true);
    }

    public function tradelinkUser(Request $request)
    {
        $tradelink = Tradelink::select('id', 'name', 'image', 'category_id')
            ->when($request->category_id, fn ($query) => $query->where('category_id', $request->category_id))
            ->with('category:id,title')
            ->paginate($request->limit ?? $this->limit);
        return $this->returnResponse(TradelinkResource::collection($tradelink), $paginate = true);
    }

    public function tradelinkUserDetail(Request $request)
    {
        try {
            $tradelink = Tradelink::findorfail($request->id);
            return $this->returnResponse(new TradelinkDetailResource($tradelink));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return $this->notFoundResponse();
        } catch (ValidationException $th) {
            return $this->validationError($th);
        } catch (\Exception $th) {
            return $this->errorResponse($th->getMessage());
        }
    }
}
