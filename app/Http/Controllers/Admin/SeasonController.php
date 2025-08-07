<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SeasonStoreRequest;
use App\Models\Serie;
use App\Models\SerieSeason;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index($serieId)
    {
        $seasons = SerieSeason::where('serie_id', $serieId)->get();
        $serie = Serie::find($serieId);
        return view('admin.season.index', compact('seasons', 'serie'));
    }

    public function create($serieId)
    {
        return view('admin.season.create', compact('serieId'));
    }

    public function store(SeasonStoreRequest $request, $serieId)
    {
        SerieSeason::query()->create(array_merge($request->all(), ['serie_id' => $serieId]));

        return redirect()->route('admin.season.index', $serieId);
    }
}
