<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'name_surname'      => $this->formatted_name,
            'email'      => $this->email,
            'phone_number'      => $this->phone_number,
            'phone_is_verified'      => $this->phone_is_verified,
            'profile_image' => $this->profile_image
        ];
    }
}
