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

    public function getNewsForSlug($categorySlug = null, $magazineSlug = null)
    {
        return $this->newsRepository->getNewsForSlug($categorySlug, $magazineSlug);
    }

    public function getNewForSlug($slug)
    {
        return $this->newsRepository->getNewForSlug($slug);
    }

    public function getNew($id)
    {
        return $this->newsRepository->getNew($id);
    }

    public function readsUserForNews($user, $new): void
    {
        $this->newsRepository->readsUserForNews($user, $new);
    }

    public function getTrendNews()
    {
        return $this->newsRepository->getTrendNews();
    }
}
