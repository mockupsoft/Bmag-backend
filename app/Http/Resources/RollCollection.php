<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RollCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => RollResource::collection($this->collection),
        ];
    }
}
