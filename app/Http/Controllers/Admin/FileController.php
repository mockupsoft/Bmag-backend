<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::query()->orderBy('created_at', 'DESC')->get();

        return view('admin.file.index', compact('files'));
    }

    public function create()
    {
        return view('admin.file.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = time() . '.' . $file->getClientOriginalExtension();

                Storage::disk('s3')->put(
                    'bmag/' . $fileName,
                    file_get_contents($file),
                    'public'
                );

                $url = Storage::disk('s3')->url('bmag/' . $fileName);
                File::query()->create(['path' => $url]);
                sleep(1);
            }
        }

        session_success("Dosya yüklendi.");
        return redirect()->route('admin.file.index');
    }
}
