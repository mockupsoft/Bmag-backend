<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MagazineIssueCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => $this->collection->transform(function ($issue) {
                return new MagazineIssueResource($issue);
            }),
        ];
    }
}
