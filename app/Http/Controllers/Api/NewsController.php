<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsCollection;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private NewsService $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function getNews()
    {
        $news = $this->newsService->getNews();
        return new NewsCollection($news);
    }

    public function getNewsForCategory($categorySlug)
    {
        $newsForCategory = $this->newsService->getNews($categorySlug);

        return new NewsCollection($newsForCategory);
    }

    public function getNewsForMagazine($magazineSlug)
    {
        $newsForMagazine = $this->newsService->getNews(null, $magazineSlug);

        return new NewsCollection($newsForMagazine);
    }
}
