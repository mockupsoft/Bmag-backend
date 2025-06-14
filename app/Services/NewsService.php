<?php

namespace App\Services;

use App\Repositories\NewsRepository;

class NewsService
{
    private NewsRepository $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function getNews($categorySlug = null, $magazineSlug = null)
    {
        return $this->newsRepository->getNews($categorySlug, $magazineSlug);
    }
}
