<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MagazineIssueStoreRequest;
use App\Models\Magazine;
use App\Models\MagazineIssue;
use App\Traits\Uploadable;

class MagazineIssueController extends Controller
{
    use Uploadable;

    public function index()
    {
        $magazineIssues = MagazineIssue::all();
        return view('admin.magazine-issue.index', compact('magazineIssues'));
    }

    public function create()
    {
        $magazines = Magazine::all();
        return view('admin.magazine-issue.create', compact('magazines'));
    }

    public function store(MagazineIssueStoreRequest $request)
    {
        $magazineIssue = MagazineIssue::query()->create($request->validated());

        if($request->hasFile('cover_image')){
            $magazineIssue->cover_image = $this->uploadToS3($request->file('cover_image'), 'bmag');
            $magazineIssue->save();
        }

        if($request->hasFile('pdf_path')){
            $magazineIssue->pdf_path = $this->uploadToS3($request->file('pdf_path'), 'bmag');
            $magazineIssue->save();
        }

        session_success("Sayı başarıyla kaydedildi.");
        return redirect()->route('admin.magazine-issue.index');
    }
}
