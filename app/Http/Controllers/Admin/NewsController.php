<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsStoreRequest;
use App\Http\Requests\Admin\NewsUpdateRequest;
use App\Models\Category;
use App\Models\Magazine;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->orderBy('created_at', 'DESC')->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        $magazines = Magazine::all();
        return view('admin.news.create', compact('categories', 'magazines'));
    }

    public function store(NewsStoreRequest $request)
    {
        $news = News::query()->create($request->validated());

        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        Storage::disk('s3')->put(
            'bmag/' . $fileName,
            file_get_contents($file),
            'public'
        );

        $url = Storage::disk('s3')->url('bmag/' . $fileName);
        $news->image = $url;
        $news->save();

        session_success("Haber eklendi ve onaya gönderildi.");
        return redirect()->route('admin.news.index');
    }

    public function notApproved()
    {
        $news = News::query()->whereNull('published_at')->get();
        return view('admin.news.not-approved-index', compact('news'));
    }

    public function edit($newsId)
    {
        $news = News::query()->findOrFail($newsId);
        $categories = Category::all();
        $magazines = Magazine::all();
        return view('admin.news.edit', compact('news', 'categories', 'magazines'));
    }

    public function update(NewsUpdateRequest $request, $newsId)
    {
        $news = News::query()->findOrFail($newsId);
        $news->update(array_merge($request->all(), [
            'published_at' => $request->is_published == 1 ? Carbon::now() : null,
            'published_by' => Auth::user()->id
        ]));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            Storage::disk('s3')->put(
                'bmag/' . $fileName,
                file_get_contents($file),
                'public'
            );

            $url = Storage::disk('s3')->url('bmag/' . $fileName);
            $news->image = $url;
            $news->save();
        }

        session_success("Haber güncellendi.");
        return redirect()->route('admin.news.index');
    }
}
