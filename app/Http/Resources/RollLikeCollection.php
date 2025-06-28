<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RollLikeCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => RollLikeResource::collection($this->collection),
        ];
    }
}
