<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RollComment;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RollCommentController extends Controller
{
    public function index()
    {
        $rollComments = RollComment::query()->paginate(15);
        return view('admin.roll-comment.index', compact('rollComments'));
    }

    public function edit(RollComment $rollComment)
    {
        return view('admin.roll-comment.edit', compact('rollComment'));
    }

    public function update(Request $request, RollComment $rollComment)
    {
        $rollComment->update([
            "approved_at" => Carbon::now(),
            "approved_by" => Auth::user()->id
        ]);

        session_success("Yorum onaylandı ve artık gözükür.");
        return redirect()->route('admin.roll-comments.index');
    }
}
