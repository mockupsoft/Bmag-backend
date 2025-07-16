<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RollResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'path' => $this->path,
            'description' => $this->description,
            'magazine' => [
                'id' => $this->magazine?->id,
                'name' => $this->magazine?->name,
                'image' => $this->magazine?->image,
                'slug' => $this->magazine?->slug
            ],
            'like_count' => $this->likes_count,
            'comment_count' => $this->comments_count,
        ];
    }
}
