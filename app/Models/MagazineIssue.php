<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagazineIssue extends Model
{
    protected $table = "magazine_issues";

    protected $fillable = [
        "magazine_id",
        "title",
        "slug",
        "issue_number",
        "issue_date",
        "cover_image",
        "pdf_path",
        "barcode",
        "price",
        "vat_price",
        "stock",
        "is_published",
    ];
}
