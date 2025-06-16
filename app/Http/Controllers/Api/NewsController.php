<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\NewsResource;
use App\Models\News;
use App\Models\UserFavorite;
use App\Services\NewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getNew($slug)
    {
        $new = $this->newsService->getNewForSlug($slug);

        return new NewsResource($new);
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

    public function addNewsToFavorites(Request $request)
    {
        $news = $this->newsService->getNew($request->news_id);

        if (!$news){
            return response()->json([
                "status" => "error",
                "message" => "İçerik bulunamadı",
            ], 404);
        }

        $loggedUser = Auth::guard('api')->user();

        $userFavorite = UserFavorite::query()
            ->where('user_id', $loggedUser->id)
            ->where('news_id', $news->id)
            ->first();

        if ($userFavorite) {
            return response()->json([
                "status" => "error",
                "message" => "Bu içerik zaten favorilerinizde var"
            ]);
        }

        UserFavorite::query()->create([
            "user_id" => Auth::guard('api')->user()->id,
            "news_id" => $request->news_id,
        ]);

        return response()->json([
            "status" => "success",
            "message" => "İçerik favorilerinize eklendi",
        ], 201);
    }

    public function getFavorites()
    {
        $userFavorites = UserFavorite::query()->where('user_id', Auth::guard('api')->user()->id)->pluck('news_id')->toArray();
        $userFavoriteNews = News::query()->whereIn('id', $userFavorites)->paginate(10);

        return new NewsCollection($userFavoriteNews);
    }
}
