<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SerieSectionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name'              => $this->name,
            'slug'              => $this->slug,
            'description'       => $this->description,
            'video_path'        => $this->video_path,
            'locked'            => $this->locked
        ];
    }
}
