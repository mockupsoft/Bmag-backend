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
            'in_title' => $this->in_title,
            'out_title' => $this->out_title,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'content' => $this->content,
            'large_image' => $this->large_image,
            'news_detail_image' => $this->news_detail_image,
            'list_image' => $this->list_image,
            'category' => [
                'name' => $this->category->name,
                'slug' => $this->category->slug
            ],
            'magazine' => [
                'name' => $this->magazine?->name,
                'slug' => $this->magazine?->slug,
                'logo' => $this->magazine?->image
            ],
            'is_published' => $this->is_published,
            'viewed' => $this->viewed,
            'published_at' => $this->published_at,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'tags' => $this->tags,
            'next_news_slug' => $this->getNextNews($this->id)->slug,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
