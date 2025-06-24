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

    protected static function booted()
    {
        static::creating(function ($magazineIssue) {
            $magazineIssue->slug = Str::slug($magazineIssue->title);

            // Slug benzersiz olacaksa burada kontrol edebilirsin
            $originalSlug = $magazineIssue->slug;
            $i = 1;
            while (News::where('slug', $magazineIssue->slug)->exists()) {
                $magazineIssue->slug = $originalSlug . '-' . $i++;
            }
        });
    }

    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }
}
