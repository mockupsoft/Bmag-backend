<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Magazine;
use App\Models\News;

class NewsRepository
{
    private News $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function getNews($categorySlug, $magazineSlug)
    {
        $category = Category::query()
            ->where('slug', $categorySlug)
            ->first();

        $magazine = Magazine::query()
            ->where('slug', $magazineSlug)
            ->first();

        return $this
            ->news
            ->with('category', 'magazine')
            ->when($category, function ($query) use ($category) {
                return $query->where('category_id', $category->id);
            })
            ->when($magazine, function ($query) use ($magazine) {
                return $query->where('magazine_id', $magazine->id);
            })
            ->where('is_published', true)
            ->latest()
            ->paginate(10);
    }
}
