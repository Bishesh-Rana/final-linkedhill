<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogDetailResource;
use App\Http\Resources\BlogResource;
use App\Http\Requests\Admin\BlogRequest;
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

    public function store(Request $request)
    {
        $data =  Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'type' => 'required',
            'image' => 'nullable',
            'featured' => 'boolean',
            'description' => 'required',
            'meta_keyword' => 'max:300',
            'meta_description' => 'max:300',
        ])->validate();
        $blog = Blog::create($data);
        $blog->type = $request->type;
        $blog->save();
        $blog->categories()->sync($request->category_id);
        return response( ['title'=>'success', 'message'=> $request->type.' created successfuly.']);
    }
    public function update(Request $request, $id)
    {
        $data =  Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'type' => 'required',
            'image' => 'nullable',
            'featured' => 'boolean',
            'description' => 'required',
            'meta_keyword' => 'max:300',
            'meta_description' => 'max:300',
        ])->validate();
        $blog = Blog::find($id);
        $blog->update($data);
        $blog->categories()->sync($request->category_id);
        return response( ['title'=>'success', 'message'=> $request->type.' updated successfuly.']);
    }

    public function getDeletedBlogs()
    {
        $blogs = Blog::onlyTrashed()->get();
        return $this->returnResponse(BlogResource::collection($blogs));
    }
       

    public function restoreBlog($id)
    {
        Blog::withTrashed()->find($id)->restore();
        return response()->json( ['title'=>'success','message'=>'Blog restored successfuly.']);
    }

    public function hardDeleteBlog($id)
    {
        Blog::withTrashed()->find($id)->forceDelete();
        return response()->json( ['title'=>'success','message'=>'Blog hard deleted successfuly.']);
    }
}
