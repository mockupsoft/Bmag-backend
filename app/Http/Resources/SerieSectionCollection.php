<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SerieSectionCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return SerieSectionResource::collection($this->collection);
    }
}
