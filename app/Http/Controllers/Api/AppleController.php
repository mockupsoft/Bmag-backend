<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use Http;
use Illuminate\Http\Request;

class AppleController extends Controller
{
    public function verifyIosPurchase(Request $request)
    {
        $receiptData = $request->input('receipt_data');
        $productId = $request->input('product_id');

        $response = Http::post('https://buy.itunes.apple.com/verifyReceipt', [
            'receipt-data' => $receiptData,
            'password' => config('services.apple.shared_secret'), // App Store shared secret
            'exclude-old-transactions' => true,
        ]);

        $result = $response->json();

        if ($result['status'] === 0) {
            // Receipt geçerli → kullanıcıya abonelik ver

            $user = auth()->user();
            $plan = SubscriptionPlan::where('apple_product_id', $productId)->firstOrFail();

            $user->subscriptions()->create([
                'subscription_plan_id' => $plan->id,
                'starts_at' => now(),
                'ends_at' => now()->addMonth(),
                'status' => 'active'
            ]);

            return response()->json(['message' => 'Abonelik başarıyla doğrulandı']);
        }

        return response()->json(['error' => 'Receipt geçersiz'], 400);
    }

}
