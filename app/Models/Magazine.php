<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Magazine extends Model
{
    protected $table = "magazines";

    protected $fillable = [
        "name",
        "slug",
        "description",
        "image",
        "meta_title",
        "meta_description",
        "meta_keywords",
        "canonical_url",
        "seo_image",
        "robots",
        "order",
        "is_active"
    ];

    protected static function booted()
    {
        static::creating(function ($magazine) {
            $magazine->slug = Str::slug($magazine->name);
            $originalSlug = $magazine->slug;
            $i = 1;
            while (Magazine::where('slug', $magazine->slug)->exists()) {
                $magazine->slug = $originalSlug . '-' . $i++;
            }
        });
    }

    public function issues()
    {
        return $this->hasMany(MagazineIssue::class);
    }

    public function roll()
    {
        return $this->hasMany(Roll::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
