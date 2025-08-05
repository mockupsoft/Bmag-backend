<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SerieCollection;
use App\Http\Resources\SerieResource;
use App\Http\Resources\SerieSectionResource;
use App\Models\EpisodeProgress;
use App\Models\Serie;
use App\Models\SerieSection;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class SerieController extends Controller
{
    public function getSeries()
    {
        $series = Serie::query()->orderBy('row', 'ASC')->get();
        return new SerieCollection($series);
    }

    public function getSerie($slug)
    {
        $serie = Serie::query()->where('slug', $slug)->with(['seasons'])->firstOrFail();
        $serie->seasons->each(function ($season) use ($serie) {
            $season->setRelation('sections', $season->sections->where('serie_id', $serie->id)->values());
        });

        return new SerieResource($serie);
    }

    public function getEpisode($sectionSlug)
    {
        $section = SerieSection::query()->where('slug', $sectionSlug)->firstOrFail();

        try {
            if (JWTAuth::parseToken()->authenticate()) {
                $section->watched_seconds = $section->userProgress ? $section->userProgress->watched_seconds : 0;
            }
        } catch (JWTException $e) {
            $section->watched_seconds = 0;
        }

        return new SerieSectionResource($section);
    }

    public function watch(Request $request)
    {
        EpisodeProgress::query()->updateOrCreate([
            'user_id'           => auth()->id(),
            'episode_id'        => $request->episode_id,
        ],[
            'user_id'           => auth()->id(),
            'episode_id'        => $request->episode_id,
            'watched_seconds'   => $request->watched_seconds,
        ]);
    }
}
