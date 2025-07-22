<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RollCommentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user' => [
                'id'            => $this->user->id,
                'name_surname'  => $this->formatted_name,
                'profile_image' => $this->profile_image
            ],
            'comment' => $this->comment
        ];
    }
}
