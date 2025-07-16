<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Magazine;
use App\Models\Roll;
use App\Traits\Uploadable;
use Illuminate\Http\Request;

class RollController extends Controller
{
    use Uploadable;
    public function index(Magazine $magazine)
    {
        $rolls = Roll::query()->where('magazine_id', $magazine->id)->get();
        return view('admin.roll.index', compact('rolls', 'magazine'));
    }

    public function create(Magazine $magazine)
    {
        return view('admin.roll.create', compact('magazine'));
    }

    public function store(Request $request, Magazine $magazine)
    {
        $videoPath = $this->uploadToS3($request->file('video'), 'bmag');

        Roll::query()->create(
            array_merge($request->except('video'), ['magazine_id' => $magazine->id, 'path' => $videoPath])
        );

        session_success("Yükleme başarılı");
        return redirect()->route('admin.roll.index', $magazine);
    }
}
