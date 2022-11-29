<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'description' => $this->description,
            'date' => $this->created_at->format('d M, Y'),
            'related' => BlogResource::collection($this->getRelatedBlogs()),
        ];
    }

    private function getRelatedBlogs()
    {
        return Blog::where('featured', true)->where('blogs.id', '<>', $this->id)->where('type', $this->type)->whereHas('categories', fn (Builder $builder) => $builder->whereIn('categories.id', $this->categories()->pluck('categories.id') ?? [1]))->limit(4)->get();
    }
}
