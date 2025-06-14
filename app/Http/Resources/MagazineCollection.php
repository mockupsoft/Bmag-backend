<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MagazineCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => MagazineResource::collection($this->collection),
        ];
    }
}
