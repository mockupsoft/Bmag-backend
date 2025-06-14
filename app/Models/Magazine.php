<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        "is_active"
    ];
}
