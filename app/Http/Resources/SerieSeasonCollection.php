<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SerieSeasonCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return SerieSeasonResource::collection($this->collection);
    }
}
