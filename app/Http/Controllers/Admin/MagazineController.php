<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MagazineDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MagazineStoreRequest;
use App\Models\Magazine;
use App\Traits\Uploadable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MagazineController extends Controller
{
    use Uploadable;
    public function index(MagazineDataTable $dataTable)
    {
        return $dataTable->render('admin.magazine.index');
    }

    public function create()
    {
        return view('admin.magazine.create');
    }

    public function store(MagazineStoreRequest $request)
    {
        $magazine = Magazine::query()->create($request->validated());

        if ($request->hasFile('image')) {
            $magazine->image = $this->uploadToS3($request->file('image'), 'bmag');
            $magazine->save();
        }

        session_success("Dergi eklendi.");
        return redirect()->route('admin.magazine.index');
    }

    public function edit(Magazine $magazine)
    {
        return view('admin.magazine.edit', compact('magazine'));
    }

    public function update(MagazineStoreRequest $request, Magazine $magazine)
    {
        $magazine->update($request->validated());

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            Storage::disk('s3')->put(
                'bmag/' . $fileName,
                file_get_contents($file),
                'public'
            );

            $url = Storage::disk('s3')->url('bmag/' . $fileName);
            $magazine->refresh()->image = $url;
            $magazine->save();
        }

        session_success("Dergi güncellendi.");
        return redirect()->route('admin.magazine.index');
    }
}
