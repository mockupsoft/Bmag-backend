<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SerieResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name'              => $this->name,
            'slug'              => $this->slug,
            'description'       => $this->description,
            'cover_image'       => $this->cover_image,
            'row'               => $this->row,
            'seasons'           => new SerieSeasonCollection($this->whenLoaded('seasons')),
        ];
    }
}
