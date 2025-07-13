<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MagazineIssueStoreRequest;
use App\Http\Requests\Admin\MagazineIssueUpdateRequest;
use App\Models\Magazine;
use App\Models\MagazineIssue;
use App\Traits\Uploadable;
use Carbon\Carbon;

class MagazineIssueController extends Controller
{
    use Uploadable;

    public function index(Magazine $magazine)
    {
        $magazineIssues = MagazineIssue::query()->where('magazine_id', $magazine->id)->orderBy('created_at', 'DESC')->get();
        return view('admin.magazine-issue.index', compact('magazineIssues', 'magazine'));
    }

    public function create(Magazine $magazine)
    {
        $magazines = Magazine::all();
        return view('admin.magazine-issue.create', compact('magazines', 'magazine'));
    }

    public function store(Magazine $magazine, MagazineIssueStoreRequest $request)
    {
        $magazineIssue = MagazineIssue::query()->create(array_merge($request->validated(), ['magazine_id' => $magazine->id, 'issue_month' => Carbon::now()->format('Y').'-'.$request->issue_month]));

        if($request->hasFile('cover_image')){
            $magazineIssue->cover_image = $this->uploadToS3($request->file('cover_image'), 'bmag');
            $magazineIssue->save();
        }

        if($request->hasFile('pdf_path')){
            $magazineIssue->pdf_path = $this->uploadToS3($request->file('pdf_path'), 'bmag');
            $magazineIssue->save();
        }

        session_success("Sayı başarıyla kaydedildi.");
        return redirect()->route('admin.magazine-issue.index', $magazine);
    }

    public function edit(Magazine $magazine, MagazineIssue $magazineIssue)
    {
        $magazines = Magazine::all();

        return view('admin.magazine-issue.edit', compact('magazineIssue', 'magazines', 'magazine'));
    }

    public function update(MagazineIssue $magazineIssue, MagazineIssueUpdateRequest $request)
    {
        $magazineIssue->update($request->validated());

        if ($request->has('delete_cover_image')){
            $magazineIssue->cover_image = null;
        }

        if ($request->has('delete_pdf')){
            $magazineIssue->pdf_path = null;
        }

        if($request->hasFile('cover_image')){
            $magazineIssue->cover_image = $this->uploadToS3($request->file('cover_image'), 'bmag');
        }

        if($request->hasFile('pdf_path')){
            $magazineIssue->pdf_path = $this->uploadToS3($request->file('pdf_path'), 'bmag');
        }
        $magazineIssue->save();

        session_success("Sayı başarıyla güncellendi.");
        return redirect()->route('admin.magazine-issue.index', $magazineIssue->magazine);
    }
}
