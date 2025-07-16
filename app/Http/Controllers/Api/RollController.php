<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RollCommentStoreRequest;
use App\Http\Resources\RollCommentCollection;
use App\Http\Resources\RollLikeCollection;
use App\Http\Resources\RollResource;
use App\Models\Roll;
use App\Models\RollComment;
use App\Models\RollLike;
use App\Models\RollView;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RollController extends Controller
{
    public function getRoll()
    {
        $authUser = Auth::guard('api')
            ->user();

        $watchedRollIds = RollView::query()
            ->when($authUser, function ($query) use ($authUser) {
                $query->where('user_id', $authUser->id);
            })
            ->pluck('roll_id')
            ->toArray();

        $roll = Roll::query()
            ->when($authUser, function ($query) use ($authUser, $watchedRollIds) {
                $query->whereNotIn('id', $watchedRollIds);
            })
            ->withCount(['likes', 'comments'])
            ->inRandomOrder()
            ->first();

        if ($roll) {
            if (Auth::guard('api')->check()){
                RollView::query()
                    ->updateOrCreate(
                        [
                            'user_id' => $authUser,
                            'roll_id' => $roll->id
                        ],
                        [
                            'user_id' => $authUser->id,
                            'roll_id' => $roll->id,
                            'viewed_at' => Carbon::now()
                        ]
                    );
            }
            return new RollResource($roll);
        }else{
            return response()->json([
                "message" => "Roll bulunamadı",
                "data" => []
            ], Response::HTTP_NO_CONTENT);
        }
    }

    public function like(Roll $roll)
    {
        if (
            $rollLike = RollLike::query()->where([
                'roll_id' => $roll->id,
                'user_id' => Auth::guard('api')->user()->id
            ])->first()
        ){
            $rollLike->delete();

            return response()->json([
                "status" => "success",
                "message" => "Beğeni kaldırıldı"
            ]);
        }else{
            RollLike::query()
                ->create(
                    [
                        'user_id' => Auth::guard('api')->user()->id,
                        'roll_id' => $roll->id
                    ]
                );

            return response()->json([
                "status" => "success",
                "message" => "Gönderi beğenildi"
            ]);
        }
    }

    public function comment(RollCommentStoreRequest $request, Roll $roll)
    {
        RollComment::query()->create([
            "user_id" => Auth::guard('api')->user()->id,
            "roll_id" => $roll->id,
            "comment" => $request->comment,
            "ip" => $request->ip()
        ]);

        return response()->json([
            "status" => "success",
            "message" => "Yorumunuz ulaştı, inceleme sonucunda yayınlanacak."
        ]);
    }

    public function getLikes(Roll $roll, Request $request)
    {
        $rollLikes = RollLike::query()
            ->where('roll_id', $roll->id)
            ->paginate($request->per_page ?? 10);

        return new RollLikeCollection($rollLikes);
    }

    public function getComments(Roll $roll, Request $request)
    {
        $rollComments = RollComment::query()
            ->where('roll_id', $roll->id)
            ->paginate($request->per_page ?? 10);

        return new RollCommentCollection($rollComments);
    }
}
