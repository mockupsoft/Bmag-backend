<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MagazineIssueResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'magazine' => [
                'name' => $this->magazine?->name,
                'slug' => $this->magazine?->slug,
                'logo' => $this->magazine?->image
            ],
            'issue_code'   => $this->issue_code,
            'issue_month'  => $this->issue_month,
            'cover_image'  => $this->cover_image,
            'pdf_path'     => $this->pdf_path,
            'barcode'      => $this->barcode,
            'price'        => number_format($this->price, 2),
            'vat_price'    => number_format($this->vat_price, 2),
            'stock'        => $this->stock,
            'is_published' => (bool) $this->is_published,
        ];
    }
}
