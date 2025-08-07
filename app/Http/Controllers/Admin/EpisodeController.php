<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use App\Models\SerieSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Str;
use App\Jobs\ConvertVideoToHLS;

class EpisodeController extends Controller
{
    public function index($serieId, $seasonId)
    {
        $episodes = SerieSection::query()->where('serie_id', $serieId)->where('serie_season_id', $seasonId)->get();

        return view('admin.episode.index', compact('episodes', 'serieId', 'seasonId'));
    }

    public function create($serieId, $seasonId)
    {
        $serie = Serie::query()->findOrFail($serieId);
        return view('admin.episode.create', compact('serieId', 'seasonId', 'serie'));
    }

    public function store(Request $request, $serieId, $seasonId)
    {
        $uploadedFile = $request->file('video');
        $filename = Str::slug($request->name) . '.mp4';
        $path = $uploadedFile->storeAs('videos-temp', $filename); // storage/app/videos-temp/...
        $fullPath = storage_path("app/$path");

        $key = Str::slug($request->name);

        $section = SerieSection::query()->create(array_merge($request->all(), ['serie_id' => $serieId, 'serie_season_id' => $seasonId, 'video_path' => '-']));


        try {
            ConvertVideoToHLS::dispatch($fullPath, $key, $section->id);
            Log::info('📦 Job dispatch edildi.');
        } catch (\Exception $e) {
            Log::error('❌ Job dispatch HATASI: ' . $e->getMessage());
        }

        return response()->json(['success' => true, 'url' => route('admin.episode.index', ['serieId' => $serieId, 'seasonId' => $seasonId])]);
    }
}
