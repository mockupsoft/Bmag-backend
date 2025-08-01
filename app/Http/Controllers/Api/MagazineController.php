<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MagazineCollection;
use App\Http\Resources\MagazineIssueCollection;
use App\Http\Resources\MagazineIssueResource;
use App\Http\Resources\MagazineResource;
use App\Http\Resources\NewsCollection;
use App\Services\MagazineService;
use App\Services\NewsService;

class MagazineController extends Controller
{
    private MagazineService $magazineService;
    private NewsService $newsService;

    public function __construct(MagazineService $magazineService, NewsService $newsService)
    {
        $this->magazineService = $magazineService;
        $this->newsService = $newsService;
    }

    public function getMagazines()
    {
        $magazines = $this->magazineService->getMagazines();
        return new MagazineCollection($magazines);
    }

    public function getMagazine($magazineSlug)
    {
        $magazine = $this->magazineService->getMagazineForSlug($magazineSlug);
        return new MagazineResource($magazine);
    }

    public function getMagazineIssue($magazineSlug, $magazineIssueIssueMonth)
    {
        $magazine = $this->magazineService->getMagazineForSlug($magazineSlug);
        $magazineIssue = $this->magazineService->getMagazineIssueForIssueMonth($magazine, $magazineIssueIssueMonth);
        return new MagazineIssueResource($magazineIssue);
    }

    public function getMagazineIssues($magazineSlug)
    {
        $magazine = $this->magazineService->getMagazineForSlug($magazineSlug);
        if (!$magazine) {
            return response()->json([
                "status" => "error",
                "message" => "Dergi bulunamadı"
            ], 404);
        }
        $magazineIssues = $this->magazineService->getMagazineIssues($magazine);
        return new MagazineIssueCollection($magazineIssues);
    }

    public function getMagazineNews($magazineSlug)
    {
        $magazine = $this->magazineService->getMagazineForSlug($magazineSlug);
        if (!$magazine) {
            return response()->json([
                "status" => "error",
                "message" => "Dergi bulunamadı"
            ], 404);
        }
        $news = $this->newsService->getNewsForSlug(null, $magazine->slug);
        return new NewsCollection($news);
    }
}
