<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $table = "categories";

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
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);

            // Slug benzersiz olacaksa burada kontrol edebilirsin
            $originalSlug = $category->slug;
            $i = 1;
            while (Category::where('slug', $category->slug)->exists()) {
                $category->slug = $originalSlug . '-' . $i++;
            }
        });
    }
}
