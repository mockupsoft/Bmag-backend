<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    protected $fillable = [
        "title",
        "slug",
        "summary",
        "content",
        "image",
        "is_published",
        "published_at",
        "category_id",
        "meta_title",
        "meta_description",
        "meta_keywords"
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
