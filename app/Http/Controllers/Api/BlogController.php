<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogDetailResource;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
{
    public $limit = 6;
    public function blogs(Request $request)
    {
        $blogs = Blog::where('featured', true)->where('type', 'blog')->paginate($request->limit ?? $this->limit);
        return $this->returnResponse(BlogResource::collection($blogs), $paginate = true);
    }

    public function news(Request $request)
    {
        $blogs = Blog::where('featured', true)->where('type', 'news')->paginate($request->limit ?? $this->limit);
        return $this->returnResponse(BlogResource::collection($blogs), $paginate = true);
    }

    public function blogDetail(Request $request)
    {
        try {
            Validator::make($request->all(), ['id' => ['required', 'exists:blogs,id']])->validate();
            $property = Blog::findorfail($request->id);
            return $this->successResponse(new BlogDetailResource($property));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return $this->notFoundResponse();
        } catch (ValidationException $th) {
            return $this->validationError($th);
        } catch (\Exception $th) {
            return $this->errorResponse($th->getMessage());
        }
    }
}
