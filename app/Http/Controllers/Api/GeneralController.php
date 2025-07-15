<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Magazine;
use App\Models\News;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $news = News::query()
            ->where(function ($query) use ($keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                    ->orWhere('summary', 'like', "%{$keyword}%")
                    ->orWhere('content', 'like', "%{$keyword}%")
                    ->orWhere('tags', 'like', "%{$keyword}%");
            })
            ->get();

        $magazines = Magazine::query()
            ->where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            })
            ->get();

        $response = [
            [
                "title" => "Haberler",
                "result" => $news
            ],
            [
                "title" => "Dergiler",
                "result" => $magazines
            ],
        ];

        return response()->json($response);
    }
}
