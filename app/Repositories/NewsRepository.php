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

    public function getNews()
    {
        return $this->news->with('category')->where('is_published', true)->latest()->paginate(10);
    }
}
