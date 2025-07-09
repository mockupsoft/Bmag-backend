<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'content' => $this->content,
            'image' => $this->image,
            'category' => [
                'name' => $this->category->name,
                'slug' => $this->category->slug
            ],
            'magazine' => [
                'name' => $this->magazine?->name,
                'slug' => $this->magazine?->slug
            ],
            'is_published' => $this->is_published,
            'viewed' => $this->viewed,
            'published_at' => $this->published_at,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
