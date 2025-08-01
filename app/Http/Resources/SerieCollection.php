<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SerieCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => SerieResource::collection($this->collection),
        ];
    }
}
