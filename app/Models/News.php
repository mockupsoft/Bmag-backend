<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $table = "news";

    protected $fillable = [
        "in_title",
        "out_title",
        "slug",
        "summary",
        "content",
        "large_image",
        "news_detail_image",
        "list_image",
        "is_published",
        "viewed",
        "published_at",
        "published_by",
        "category_id",
        "magazine_id",
        "meta_title",
        "meta_description",
        "meta_keywords",
        "robots"
    ];

    protected static function booted()
    {
        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);

            // Slug benzersiz olacaksa burada kontrol edebilirsin
            $originalSlug = $news->slug;
            $i = 1;
            while (News::where('slug', $news->slug)->exists()) {
                $news->slug = $originalSlug . '-' . $i++;
            }
        });
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function magazine()
    {
        return $this->hasOne(Magazine::class, 'id', 'magazine_id');
    }
}
