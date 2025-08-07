<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SerieStoreRequest;
use App\Http\Requests\Admin\SerieUpdateRequest;
use App\Models\Serie;
use Illuminate\Support\Facades\Storage;

class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::all();

        return view('admin.serie.index', compact('series'));
    }

    public function create()
    {
        return view('admin.serie.create');
    }

    public function store(SerieStoreRequest $request)
    {
        $coverImage = $request->file('cover_image');
        $coverImageFileName = time() . '.' . $coverImage->getClientOriginalExtension();
        Storage::disk('s3')->put(
            'bmag/' . $coverImageFileName,
            file_get_contents($coverImage),
            'public'
        );
        $coverImageUrl = Storage::disk('s3')->url('bmag/' . $coverImageFileName);

        Serie::query()->create(array_merge($request->all(), ['cover_image' => $coverImageUrl]));
        session_success("Dizi eklendi");

        return redirect()->route('admin.serie.index');
    }

    public function edit(Serie $serie)
    {
        return view('admin.serie.edit', compact('serie'));
    }

    public function update(SerieUpdateRequest $request, Serie $serie)
    {
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageFileName = time() . '.' . $coverImage->getClientOriginalExtension();
            Storage::disk('s3')->put(
                'bmag/' . $coverImageFileName,
                file_get_contents($coverImage),
                'public'
            );
            $coverImageUrl = Storage::disk('s3')->url('bmag/' . $coverImageFileName);
        }else{
            $coverImageUrl = $serie->cover_image;
        }

        $serie->update(array_merge($request->all(), ['cover_image' => $coverImageUrl]));
        session_success("Dizi güncellendi");

        return redirect()->route('admin.serie.index');
    }
}
