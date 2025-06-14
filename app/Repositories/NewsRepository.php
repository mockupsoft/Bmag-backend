<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\News;

class NewsRepository
{
    private News $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function getNews($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first();
        return $this
            ->news
            ->with('category', 'magazine')
            ->when($categorySlug,
                fn ($query) => $query->where('category_id', $category->id)
            )
            ->where('is_published', true)
            ->latest()
            ->paginate(10);
    }
}
