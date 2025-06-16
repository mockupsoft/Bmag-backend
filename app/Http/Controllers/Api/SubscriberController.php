<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreSubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribe(StoreSubscriberRequest $request)
    {
        Subscriber::query()
            ->create($request->validated());
        return response()->json([
            "status" => "success",
            "message" => "Abone başarıyla eklendi"
        ], 201);
    }
}
