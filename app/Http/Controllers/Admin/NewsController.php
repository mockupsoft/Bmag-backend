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
        $largeImage = $request->file('large_image');
        $largeImageFileName = time() . '.' . $largeImage->getClientOriginalExtension();
        Storage::disk('s3')->put(
            'bmag/' . $largeImageFileName,
            file_get_contents($largeImage),
            'public'
        );
        $largeImageUrl = Storage::disk('s3')->url('bmag/' . $largeImageFileName);
        sleep(1);

        $newsDetailsImage = $request->file('news_detail_image');
        $newsDetailsFileName = time() . '.' . $newsDetailsImage->getClientOriginalExtension();
        Storage::disk('s3')->put(
            'bmag/' . $newsDetailsFileName,
            file_get_contents($newsDetailsImage),
            'public'
        );
        $newsDetailsImageUrl = Storage::disk('s3')->url('bmag/' . $newsDetailsFileName);
        sleep(1);

        $listImage = $request->file('list_image');
        $listImageFileName = time() . '.' . $listImage->getClientOriginalExtension();
        Storage::disk('s3')->put(
            'bmag/' . $listImageFileName,
            file_get_contents($listImage),
            'public'
        );
        $listImageUrl = Storage::disk('s3')->url('bmag/' . $listImageFileName);
        News::query()->create(array_merge(
            $request->validated(),
            [
                'large_image' => $largeImageUrl,
                'news_detail_image' => $newsDetailsImageUrl,
                'list_image' => $listImageUrl
            ]
        ));

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

        if ($request->hasFile('large_image')) {
            $largeImage = $request->file('large_image');
            $largeImageFileName = time() . '.' . $largeImage->getClientOriginalExtension();
            Storage::disk('s3')->put(
                'bmag/' . $largeImageFileName,
                file_get_contents($largeImage),
                'public'
            );
            $largeImageUrl = Storage::disk('s3')->url('bmag/' . $largeImageFileName);
            sleep(1);

            $news->large_image = $largeImageUrl;
        }

        if ($request->hasFile('news_detail_image')) {
            $newsDetailsImage = $request->file('news_detail_image');
            $newsDetailsFileName = time() . '.' . $newsDetailsImage->getClientOriginalExtension();
            Storage::disk('s3')->put(
                'bmag/' . $newsDetailsFileName,
                file_get_contents($newsDetailsImage),
                'public'
            );
            $newsDetailsImageUrl = Storage::disk('s3')->url('bmag/' . $newsDetailsFileName);
            sleep(1);
            $news->news_detail_image = $newsDetailsImageUrl;
        }

        if ($request->hasFile('list_image')) {
            $listImage = $request->file('list_image');
            $listImageFileName = time() . '.' . $listImage->getClientOriginalExtension();
            Storage::disk('s3')->put(
                'bmag/' . $listImageFileName,
                file_get_contents($listImage),
                'public'
            );
            $listImageUrl = Storage::disk('s3')->url('bmag/' . $listImageFileName);
            $news->list_image = $listImageUrl;
        }

        $news->save();

        session_success("Haber güncellendi.");
        return redirect()->route('admin.news.index');
    }
}
