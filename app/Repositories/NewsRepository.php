<?php

namespace App\Repositories;

use App\Models\News;

class NewsRepository
{
    private News $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function getNews($categoryId)
    {
        return $this
            ->news
            ->with('category', 'magazine')
            ->when($categoryId,
                fn ($query) => $query->where('category_id', $categoryId)
            )
            ->where('is_published', true)
            ->latest()
            ->paginate(10);
    }
}
