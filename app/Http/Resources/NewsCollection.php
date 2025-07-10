<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return $this->collection->transform(function ($news) {
            return new NewsResource($news);
        })->all();
    }
}
