<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SerieSeasonResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name'              => $this->name,
            'sections' => new SerieSectionCollection($this->whenLoaded('sections')),
        ];
    }
}
