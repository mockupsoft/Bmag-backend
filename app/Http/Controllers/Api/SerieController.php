<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SerieCollection;
use App\Http\Resources\SerieResource;
use App\Http\Resources\SerieSectionResource;
use App\Models\Serie;
use App\Models\SerieSection;
use Illuminate\Http\Request;

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
        return new SerieSectionResource($section);
    }
}
