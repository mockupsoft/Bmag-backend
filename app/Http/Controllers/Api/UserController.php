<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChangePasswordRequest;
use App\Http\Requests\Api\UpdateProfileRequest;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\NewsResource;
use App\Http\Resources\UserResource;
use App\Models\News;
use App\Models\UserNewsViews;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function me()
    {
        $user = auth('api')->user();
        return new UserResource($user);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth('api')->user();

        $user->update($request->validated());

        return new UserResource($user->refresh());
    }

    public function getNewsViewingHistory()
    {
        $newsViewingHistory = UserNewsViews::query()->where('user_id', auth('api')->id())->pluck('news_id')->toArray();
        $news = News::query()->whereIn('id', $newsViewingHistory)->get();

        return new NewsCollection($news);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'message' => 'Mevcut şifre yanlış.'
            ], 403);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'message' => 'Şifre başarıyla güncellendi.'
        ]);
    }
}
