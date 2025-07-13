<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MagazineIssue extends Model
{
    protected $table = "magazine_issues";

    protected $fillable = [
        "magazine_id",
        "issue_month",
        "description",
        "issue_code",
        "cover_image",
        "pdf_path",
        "barcode",
        "price",
        "vat_price",
        "stock",
        "is_published",
    ];

    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }
}
