<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RollCommentCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => RollCommentResource::collection($this->collection),
        ];
    }
}
